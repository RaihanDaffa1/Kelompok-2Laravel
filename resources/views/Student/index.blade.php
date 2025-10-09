@extends('layouts.app')

@section('content') 
<style>
    :root {
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --success-color: #16a34a;
        --danger-color: #dc2626;
        --warning-color: #f59e0b;
        --text-primary: #1e3a8a;
        --bg-light: #f3f4f6;
        --white: #ffffff;
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
        --border-color: #e5e7eb;
        --border-radius: 12px;
        --transition: all 0.3s ease;
    }

    * { box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

    /* ===== HEADER ===== */
    .header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin-bottom: 20px; 
        flex-wrap: wrap; 
        gap: 15px; 
    }
    h1 { 
        color: var(--text-primary); 
        font-size: 1.8rem; 
        font-weight: 700; 
        display: flex; 
        align-items: center; 
        gap: 10px; 
    }
    h1 i { color: var(--primary-color); }

    /* ===== SEARCH BAR ===== */
    .search-bar { display: flex; gap: 10px; flex-wrap: wrap; flex: 1; }
    .search-bar form { display: flex; flex: 1; gap: 10px; min-width: 250px; }
    .search-bar input {
        flex: 1; padding: 10px 14px; border: 2px solid var(--border-color);
        border-radius: var(--border-radius); font-size: 14px; 
    }
    .search-bar input:focus {
        border-color: var(--primary-color); 
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
    }
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: var(--white); padding: 10px 16px; border-radius: var(--border-radius);
        font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 6px;
        border: none; cursor: pointer; transition: var(--transition);
    }
    .btn-primary:hover { opacity: 0.95; transform: translateY(-1px); }

    /* ===== ALERT SUCCESS ===== */
    .success-message {
        background: linear-gradient(135deg, #dcfce7, #bbf7d0);
        color: #166534; padding: 12px 20px; border-radius: var(--border-radius);
        margin-bottom: 20px; border-left: 4px solid var(--success-color);
        font-weight: 500; display: flex; align-items: center; gap: 10px;
    }

    /* ===== TABLE ===== */
    .table-container { 
        background: var(--white); 
        border-radius: var(--border-radius); 
        box-shadow: var(--shadow-lg); 
        overflow-x: auto; 
    }
    table { width: 100%; border-collapse: collapse; font-size: 14px; min-width: 800px; }
    th { 
        background: linear-gradient(135deg, #1e40af, #1e3a8a);
        color: var(--white); padding: 14px 10px; font-weight: 600; text-align: left;
    }
    th:first-child, td:first-child { text-align: center; }
    td { padding: 12px 10px; border-bottom: 1px solid var(--border-color); }
    tr:hover { background: #f9fafb; }

    /* ===== STATUS ===== */
    .status-active { color: var(--success-color); font-weight: 600; display: flex; align-items: center; gap: 4px; }
    .status-inactive { color: var(--danger-color); font-weight: 600; display: flex; align-items: center; gap: 4px; }

    /* ===== ACTION BUTTONS ===== */
    .actions {
        display: flex;
        justify-content: center;
        gap: 6px;
        flex-wrap: wrap;
    }
    .btn {
        width: 36px; height: 36px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 14px; color: #fff; border: none; cursor: pointer;
        transition: var(--transition);
    }
    .btn-view { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .btn-edit { background: linear-gradient(135deg, var(--warning-color), #d97706); }
    .btn-delete { background: linear-gradient(135deg, var(--danger-color), #b91c1c); }
    .btn:hover { transform: translateY(-1px); box-shadow: var(--shadow-md); }

    /* ===== EMPTY STATE ===== */
    .empty-state { text-align: center; padding: 50px 20px; color: #6b7280; font-size: 15px; }
    .empty-state i { font-size: 3rem; color: #d1d5db; margin-bottom: 10px; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .header { flex-direction: column; align-items: stretch; }
        .search-bar { width: 100%; }
        table { font-size: 13px; }
        th, td { padding: 10px 8px; }
        .actions { gap: 4px; }
    }
</style>

<div class="header">
    <h1><i class="fa-solid fa-user-graduate"></i> Data Siswa</h1>
    <div class="search-bar">
        <form action="{{ route('student.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari siswa..." value="{{ request('search') }}">
            <button type="submit" class="btn-primary"><i class="fas fa-search"></i> Cari</button>
        </form>
        <a href="{{ route('student.create') }}" class="btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Tambah
        </a>
    </div>
</div>

@if(session('success'))
<div class="success-message">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Angkatan</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>No HP</th>
                <th>Added By</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $key => $student)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $student->nama_lengkap }}</td>
                <td>{{ $student->tempat_lahir }}</td>
                <td>{{ $student->tanggal_lahir }}</td>
                <td>{{ $student->angkatan }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->jurusan }}</td>
                <td>{{ $student->no_hp }}</td>
                <td>{{ $student->added_bye }}</td>
                <td>
                    @if($student->is_active)
                        <span class="status-active"><i class="fa fa-check-circle"></i> Aktif</span>
                    @else
                        <span class="status-inactive"><i class="fa fa-times-circle"></i> Nonaktif</span>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-view" title="Lihat">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-edit" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data siswa ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11">
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <p>Belum ada data siswa.<br><small>Tambahkan siswa pertama Anda sekarang!</small></p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
