<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'school'; // Nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'npsn'; // Nama kolom primary key
    public $incrementing = false; // Tetapkan false agar Laravel tidak menganggap primary key sebagai auto-increment
    protected $keyType = 'string'; // Tentukan tipe data untuk primary key

    protected $fillable = ['npsn', 'nama_sekolah', 'alamat', 'no_telp', 'email', 'nama_kepsek', 'created_at', 'updated_at'];
}
