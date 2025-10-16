<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // id
            $table->string('nip')->unique(); // NIP guru
            $table->string('nama_lengkap'); // Nama lengkap
            $table->string('jabatan')->nullable(); // Jabatan (opsional)
            $table->string('no_hp')->nullable(); // Nomor HP
            $table->string('email')->unique(); // Email unik
            $table->text('alamat')->nullable(); // Alamat guru
            $table->boolean('is_active')->default(true); // Status aktif
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
