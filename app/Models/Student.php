<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',       
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'angkatan',
        'alamat',
        'jurusan',
        'angkatan',
        'no_hp',
        'added_bye',
        'is_active',
        'email',

    ];
}
