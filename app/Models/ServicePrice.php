<?php

// app/Models/ServicePrice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan plural default
    protected $table = 'service_prices';

    // Tentukan field yang bisa diisi secara mass-assignment
    protected $fillable = [
        'service_name',
        'category',
        'price'
    ];

    // Tentukan tipe data untuk kolom tertentu (opsional)
    protected $casts = [
        'price' => 'integer',  // Pastikan harga disimpan sebagai integer
    ];
}

