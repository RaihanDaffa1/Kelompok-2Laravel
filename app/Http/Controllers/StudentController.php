<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil semua data dari tabel students
        $students = Student::all();

        // lempar ke view student/index.blade.php
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create'); // ini manggil file resources/views/student/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data dulu
        $request->validate([
            'nisn' => 'required|unique:students',
            'nama_lengkap' => 'required',
        ]);

        // simpan data
        Student::create([
            'nisn'          => $request->nisn,
            'nama_lengkap'  => $request->nama_lengkap,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'angkatan'      => $request->angkatan,
            'alamat'        => $request->alamat,
            'jurusan'       => $request->jurusan,
            'no_hp'         => $request->no_hp,
            'added_bye'     => auth()->check() ? auth()->user()->name : 'admin',
            'is_active'     => 1,
        ]);

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
