<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:teachers,nip',
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:teachers,email',
            'alamat' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        Teacher::create($validated);

        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:teachers,nip,' . $teacher->id,
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'alamat' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $teacher->update($validated);

        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
