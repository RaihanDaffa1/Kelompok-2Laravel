@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-800 flex items-center gap-3">
            <i class="fa-solid fa-chalkboard-user text-blue-600"></i> Data Guru
        </h1>
        <a href="{{ route('teacher.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i> Tambah Guru
        </a>
    </div>

    @if(session('success'))
        <div class="p-3 bg-green-100 border border-green-400 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-4 rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-blue-50 text-blue-700 uppercase text-xs">
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">NIP</th>
                    <th class="p-3">Nama Lengkap</th>
                    <th class="p-3">Jabatan</th>
                    <th class="p-3">No HP</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $index => $teacher)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3">{{ $teacher->nip }}</td>
                        <td class="p-3">{{ $teacher->nama_lengkap }}</td>
                        <td class="p-3">{{ $teacher->jabatan ?? '-' }}</td>
                        <td class="p-3">{{ $teacher->no_hp ?? '-' }}</td>
                        <td class="p-3">{{ $teacher->email }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs rounded-full {{ $teacher->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $teacher->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('teacher.edit', $teacher) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('teacher.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-4 text-gray-500">Belum ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $teachers->links() }}
        </div>
    </div>
</div>
@endsection
