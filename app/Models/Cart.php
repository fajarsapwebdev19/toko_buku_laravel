<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'id'; // Nama kolom primary key
    public $incrementing = false; // Tetapkan false agar Laravel tidak menganggap primary key sebagai auto-increment
    protected $keyType = 'string'; // Tentukan tipe data untuk primary key

    protected $fillable = ['id', 'book_id', 'user_id', 'created_at', 'updated_at'];

    public function book_cart()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
