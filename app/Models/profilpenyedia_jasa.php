<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilpenyedia_jasa extends Model
{
    protected $table = 'profilpenyedia_jasas';
    protected $primaryKey = 'id_provider';
    protected $fillable = [
        'provider_id',
        'photo',
        'address',
        'description',
        'no_rek',
        'Harga',
        'id_jasa',
        'id_user',
        'nama_toko',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jasa() {
        return $this->belongsTo(jasa::class, 'id_jasa', 'id_jasa');
    }

    public function orders() {
        return $this->hasMany(order::class, 'provider_id', 'id_provider');
    }

    public function reviews() {
        return $this->hasMany(review::class, 'provider_id', 'id_provider');
    }

    public function availabilities() {
        return $this->hasMany(availability::class, 'provider_id', 'id_provider');
    }

    public function verificationRequest() {
        return $this->hasOne(verification_request::class, 'provider_id', 'id_provider');
    }
    
}