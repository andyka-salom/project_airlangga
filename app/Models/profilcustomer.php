<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilcustomer extends Model{
    protected $table = 'profilcustomers';
    protected $primaryKey = 'id_profilcust';

    protected $fillable = [
        'user_id',
        'photo',
        'address',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

