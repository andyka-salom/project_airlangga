<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $table = 'availabilities';

    protected $fillable = [
        'provider_id',
        'day',
        'start_time',
        'end_time',
    ];

    public function provider() {
        return $this->belongsTo(profilpenyedia_jasa::class, 'provider_id', 'id_provider');
    }
}