<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'photo',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function profilPenyediaJasa() {
        return $this->hasOne(profilpenyedia_jasa::class, 'id_user', 'id');
    }

    public function orders() {
        return $this->hasMany(order::class, 'customer_id', 'id');
    }

    public function reviews() {
        return $this->hasMany(review::class, 'user_id', 'id');
    }

    public function verificationRequest() {
        return $this->hasOne(verification_request::class, 'provider_id', 'id_user');
    }
}
