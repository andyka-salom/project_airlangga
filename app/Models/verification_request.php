<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verification_request extends Model
{
    protected $table = 'verification_requests';

    protected $fillable = [
        'provider_id',
        'status',
    ];

    public function provider() {
        return $this->belongsTo(profilpenyedia_jasa::class, 'provider_id', 'id_provider');
    }
}