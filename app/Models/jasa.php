<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jasa extends Model {
    protected $table = 'jasas';
    protected $primaryKey = 'id_jasa';
    protected $fillable = [
        'nama_jasa',
        'id_jasa',
        'deskripsi_jasa',
        'image',
        'id_categories',
    ];

    public function category() {
        return $this->belongsTo(category::class, 'id_categories', 'id');
    }

    public function profilPenyediaJasa() {
        return $this->hasOne(profilpenyedia_jasa::class, 'id_jasa', 'id_jasa');
    }
}
