<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role'; // Nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'id'; // Nama kolom primary key
    public $incrementing = true; // Tetapkan false agar Laravel tidak menganggap primary key sebagai auto-increment

    protected $fillable = ['id', 'role_name', 'created_at', 'updated_at'];
}
