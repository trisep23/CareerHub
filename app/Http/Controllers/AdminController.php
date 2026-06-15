<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman khusus Admin.');
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();

        $totalVacancies = Vacancy::count();
        $activeVacancies = Vacancy::where('deadline', '>=', now()->format('Y-m-d'))->count();
        $totalStudents = User::where('role', 'student')->count();
        $recentVacancies = Vacancy::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'totalVacancies',
            'activeVacancies',
            'totalStudents',
            'recentVacancies'
        ));
    }

    public function manage()
    {
        $this->checkAdmin();

        $vacancies = Vacancy::latest()->get();
        return view('admin.manage', compact('vacancies'));
    }
}
