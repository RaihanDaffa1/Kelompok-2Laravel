@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="flex flex-wrap justify-between items-center gap-6 mb-10">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fa-solid fa-user-graduate text-blue-600 text-2xl"></i>
            Data Siswa
        </h1>

        <div class="flex flex-wrap gap-4">
            <form action="{{ route('student.index') }}" method="GET" class="flex gap-3">
                <input type="text" name="search" placeholder="Cari siswa..." value="{{ request('search') }}"
                    class="px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 shadow-sm">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-200 flex items-center gap-2 shadow-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
            <a href="{{ route('student.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition duration-200 flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-circle-plus"></i> Tambah
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-xl mb-8 flex items-center gap-3 shadow-sm">
        <i class="fas fa-check-circle text-green-500"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-100">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-center font-semibold">No</th>
                    <th class="px-6 py-4 font-semibold">Nama Lengkap</th>
                    <th class="px-6 py-4 font-semibold">Tempat Lahir</th>
                    <th class="px-6 py-4 font-semibold">Tgl Lahir</th>
                    <th class="px-6 py-4 font-semibold">Angkatan</th>
                    <th class="px-6 py-4 font-semibold">Alamat</th>
                    <th class="px-6 py-4 font-semibold">Jurusan</th>
                    <th class="px-6 py-4 font-semibold">No HP</th>
                    <th class="px-6 py-4 font-semibold">Added By</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $key => $student)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 text-center text-gray-700">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->nama_lengkap }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->tempat_lahir }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->tanggal_lahir }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->angkatan }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->alamat }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->jurusan }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->no_hp }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $student->added_by }}</td>
                    <td class="px-6 py-4">
                        @if($student->is_active)
                            <span class="text-green-600 font-medium flex items-center gap-2">
                                <i class="fa fa-check-circle"></i> Aktif
                            </span>
                        @else
                            <span class="text-red-600 font-medium flex items-center gap-2">
                                <i class="fa fa-times-circle"></i> Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center flex justify-center gap-3">
                        <a href="{{ route('student.show', $student->id) }}" class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 shadow-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('student.edit', $student->id) }}" class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-200 shadow-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data siswa ini?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200 shadow-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center py-12 text-gray-500">
                        <i class="fas fa-users text-5xl mb-3 opacity-40"></i><br>
                        Belum ada data siswa.<br>
                        <small class="text-gray-400">Tambahkan siswa pertama Anda sekarang!</small>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 