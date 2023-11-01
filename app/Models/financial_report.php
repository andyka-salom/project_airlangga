<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class financial_report extends Model
{
    protected $table = 'financial_reports';

    protected $fillable = [
        'date',
        'total_income',
    ];
}