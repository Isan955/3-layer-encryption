<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pin',
        'username_encrypted',
        'password_encrypted',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // <-- PENTING: Tambahkan '=> 'hashed' agar password tetap aman
            
            'pin' => 'encrypted',
            'name' => 'encrypted', 
        ];
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        if (empty($user->role)) {
            $user->role = 'user'; 
        }
    });
}
protected static function booted()
{
    static::created(function ($user) {
        $user->assignRole('user');
    });
}
}
