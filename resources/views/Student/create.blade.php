<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --border-color: #e5e7eb;
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #374151;
            line-height: 1.6;
        }

        .form-container {
            background: var(--white);
            padding: 40px;
            border-radius: var(--border-radius);
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        }

        h1 {
            text-align: center;
            color: var(--text-primary);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        h1 i {
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 14px;
        }

        label i {
            color: var(--primary-color);
            width: 16px;
        }

        input, textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: var(--transition);
            background: var(--white);
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
            font-family: inherit;
        }

        button {
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.95;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            text-decoration: none;
            font-weight: 500;
            padding: 12px 20px;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            background: var(--white);
        }

        .back-link:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .back-link i {
            margin-right: 5px;
        }

        /* Responsif untuk Mobile */
        @media (max-width: 768px) {
            body {
                padding: 15px;
                align-items: flex-start;
                padding-top: 40px;
            }

            .form-container {
                padding: 30px 25px;
                margin: 0;
                border-radius: 8px;
            }

            h1 {
                font-size: 1.5rem;
                margin-bottom: 25px;
            }

            input, textarea {
                padding: 12px 14px;
                font-size: 16px; /* Prevent zoom on iOS */
            }

            button {
                padding: 12px 18px;
                font-size: 16px;
            }

            .back-link {
                padding: 10px 16px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.3rem;
            }

            .form-container {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1><i class="fa-solid fa-user-plus"></i> Tambah Siswa</h1>
        <form action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label><i class="fas fa-id-card"></i> NISN:</label>
                <input type="text" name="nisn" required placeholder="Masukkan NISN siswa">
            </div>

            <div class="form-group">
                <label><i class="fas fa-user"></i> Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" required placeholder="Masukkan tempat lahir">
            </div>

            <div class="form-group">
                <label><i class="fas fa-calendar-day"></i> Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-graduation-cap"></i> Angkatan:</label>
                <input type="text" name="angkatan" required placeholder="Masukkan angkatan (misal: 2023)">
            </div>

            <div class="form-group">
                <label><i class="fas fa-home"></i> Alamat:</label>
                <textarea name="alamat" required placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <div class="form-group">
                <label><i class="fas fa-book-open"></i> Jurusan:</label>
                <input type="text" name="jurusan" required placeholder="Masukkan jurusan">
            </div>

            <div class="form-group">
                <label><i class="fas fa-phone"></i> No HP:</label>
                <input type="text" name="no_hp" required placeholder="Masukkan nomor HP">
            </div>

            <button type="submit">
                <i class="fa fa-save"></i> Simpan Data Siswa
            </button>
        </form>
        <a href="{{ route('student.index') }}" class="back-link">
            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Siswa
        </a>
    </div>
</body>
</html>