<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'provider_id',
        'rating',
        'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function provider() {
        return $this->belongsTo(profilpenyedia_jasa::class, 'provider_id', 'id_provider');
    }
}