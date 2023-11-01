<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
        protected $table = 'orders';
    
        protected $fillable = [
            'customer_id',
            'provider_id',
            'order_date',
            'status_pembayaran',
        ];
    
        public function customer() {
            return $this->belongsTo(User::class, 'customer_id', 'id');
        }
    
        public function provider() {
            return $this->belongsTo(profilpenyedia_jasa::class, 'provider_id', 'id_provider');
        }
    }
