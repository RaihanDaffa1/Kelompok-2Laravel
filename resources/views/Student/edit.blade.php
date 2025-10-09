<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
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

        .header {
            text-align: center;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .header i {
            color: var(--warning-color);
        }

        .form-container {
            background: var(--white);
            padding: 40px;
            border-radius: var(--border-radius);
            width: 100%;
            max-width: 600px;
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
            background: linear-gradient(135deg, var(--warning-color), #d97706);
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
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

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: var(--white);
            padding: 14px 20px;
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

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.95;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            text-decoration: none;
            margin-top: 20px;
            padding: 12px 20px;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
            background: var(--white);
            font-weight: 500;
            justify-content: center;
            width: 100%;
        }

        .back-link:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        /* Responsif untuk Mobile */
        @media (max-width: 768px) {
            body {
                padding: 15px;
                align-items: flex-start;
                padding-top: 40px;
            }

            .header {
                margin-bottom: 15px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .form-container {
                padding: 30px 25px;
                margin: 0;
                border-radius: 8px;
            }

            input, textarea {
                padding: 12px 14px;
                font-size: 16px; /* Prevent zoom on iOS */
            }

            .submit-btn {
                padding: 12px 18px;
                font-size: 16px;
            }

            .back-link {
                padding: 10px 16px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
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
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label><i class="fas fa-id-card"></i> NISN:</label>
                <input type="text" name="nisn" value="{{ $student->nisn }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-user"></i> Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" value="{{ $student->nama_lengkap }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" value="{{ $student->tempat_lahir }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-calendar-day"></i> Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-graduation-cap"></i> Angkatan:</label>
                <input type="text" name="angkatan" value="{{ $student->angkatan }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-home"></i> Alamat:</label>
                <textarea name="alamat" required>{{ $student->alamat }}</textarea>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-book-open"></i> Jurusan:</label>
                <input type="text" name="jurusan" value="{{ $student->jurusan }}" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-phone"></i> No HP:</label>
                <input type="text" name="no_hp" value="{{ $student->no_hp }}" required>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i> Update Data Siswa
            </button>
        </form>
        
        <a href="{{ route('student.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Siswa
        </a>
    </div>
</body>
</html>