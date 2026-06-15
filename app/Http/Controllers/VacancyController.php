<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private function checkAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman khusus Admin.');
        }
    }

    /**
     * Display a listing of the resource for students.
     */
    public function index(Request $request)
    {
        $query = Vacancy::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%" . $request->input('location') . "%");
        }

        $vacancies = $query->latest()->get();

        return view('student.index', compact('vacancies'));
    }

    /**
     * Display the search interface for students.
     */
    public function search(Request $request)
    {
        $query = Vacancy::query();
        $isSearched = false;

        if ($request->filled('search') || $request->filled('location')) {
            $isSearched = true;
            
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('company', 'like', "%{$search}%");
                });
            }

            if ($request->filled('location')) {
                $query->where('location', 'like', "%" . $request->input('location') . "%");
            }
        }

        $vacancies = $query->latest()->get();
        // Unique locations for filter dropdown
        $locations = Vacancy::select('location')->distinct()->pluck('location');

        return view('student.search', compact('vacancies', 'locations', 'isSearched'));
    }

    /**
     * Display the specified resource for students.
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('student.show', compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAdmin();
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date|after_or_equal:today',
        ], [
            'title.required' => 'Judul lowongan wajib diisi.',
            'company.required' => 'Nama perusahaan wajib diisi.',
            'location.required' => 'Lokasi wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'deadline.required' => 'Tanggal deadline wajib diisi.',
            'deadline.after_or_equal' => 'Tanggal deadline tidak boleh di masa lalu.',
        ]);

        Vacancy::create($request->all());

        return redirect('/admin/vacancies')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->checkAdmin();
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->checkAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ], [
            'title.required' => 'Judul lowongan wajib diisi.',
            'company.required' => 'Nama perusahaan wajib diisi.',
            'location.required' => 'Lokasi wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'deadline.required' => 'Tanggal deadline wajib diisi.',
        ]);

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());

        return redirect('/admin/vacancies')->with('success', 'Lowongan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->checkAdmin();
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect('/admin/vacancies')->with('success', 'Lowongan berhasil dihapus!');
    }
}