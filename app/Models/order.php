<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
        protected $table = 'orders';
        protected $guarded = []; 
        protected $fillable = [
            'customer_id',
            'provider_id',
            'order_date',
            'status',
            'phone',
            'alamat',
            'nama_customer',
            'nama_penyedia',
            'total_bayar'
        ];
    
        public function customer() {
            return $this->belongsTo(User::class, 'customer_id', 'id');
        }
    
        public function provider() {
            return $this->belongsTo(profilpenyedia_jasa::class, 'provider_id', 'id_provider');
        }


    public function reviews()
    {
        return $this->hasMany(Review::class, 'order_id', 'id');
    }

    }
