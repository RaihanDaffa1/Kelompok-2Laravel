<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; display:flex; justify-content:center; align-items:center; min-height:100vh; }
        .card {
            background:white; padding:25px; border-radius:15px; width:100%; max-width:450px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1); text-align:center;
        }
        h1 { color:#1e3a8a; margin-bottom:20px; }
        p { margin:8px 0; }
        strong { color:#2563eb; }
        a {
            display:inline-block; margin-top:15px; background:#6b7280; color:white;
            padding:10px 18px; border-radius:10px; text-decoration:none;
        }
        a:hover { background:#4b5563; }
    </style>
</head>
<body>
    <div class="card">
        <h1><i class="fa fa-id-card"></i> Detail Siswa</h1>
        <p><strong>NISN:</strong> {{ $student->nisn }}</p>
        <p><strong>Nama Lengkap:</strong> {{ $student->nama_lengkap }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $student->tempat_lahir }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $student->tanggal_lahir }}</p>
        <p><strong>Angkatan:</strong> {{ $student->angkatan }}</p>
        <p><strong>Alamat:</strong> {{ $student->alamat }}</p>
        <p><strong>Jurusan:</strong> {{ $student->jurusan }}</p>
        <p><strong>No HP:</strong> {{ $student->no_hp }}</p>
        <p><strong>Added By:</strong> {{ $student->added_bye }}</p>
        <a href="{{ route('student.index') }}"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>
