<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Offline fallback route
Route::get('/offline', function () {
    return view('offline');
});

// Role-based Dashboard Router
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    $totalVacancies = \App\Models\Vacancy::count();
    $activeVacancies = \App\Models\Vacancy::where('deadline', '>=', now()->format('Y-m-d'))->count();
    $recentVacancies = \App\Models\Vacancy::latest()->take(4)->get();

    return view('student.dashboard', compact('totalVacancies', 'activeVacancies', 'recentVacancies'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Student Routes (Auth-protected)
Route::middleware('auth')->group(function () {
    // Student Profile
    Route::get('/profile', function () {
        return view('student.profile');
    })->name('profile');
    
    // Vacancy List & Detail
    Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');
    
    // Search page
    Route::get('/search', [VacancyController::class, 'search'])->name('vacancies.search');
});

// Admin Routes (Auth-protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Lowongan
    Route::get('/vacancies', [\App\Http\Controllers\AdminController::class, 'manage'])->name('vacancies.manage');
    
    // CRUD Vacancies
    Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
    Route::get('/vacancies/{id}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
    Route::put('/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update');
    Route::delete('/vacancies/{id}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');
});

require __DIR__.'/auth.php';