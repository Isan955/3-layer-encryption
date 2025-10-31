<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'alamat_lengkap', 'no_hp', 'email', 'category', 'service', 'jumlah', 'pickup_delivery', 'note' , 'progress'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
