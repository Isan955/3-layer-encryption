<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika tabel Anda tidak sesuai dengan konvensi Laravel)
    protected $table = 'roles';

    // Kolom yang dapat diisi
    protected $fillable = ['name'];

    // Relasi ke User (jika tabel `users` memiliki kolom `role_id`)
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
