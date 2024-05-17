<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $fillable = [
        'code',
        'min_total_amount',
        'max_usage',
        'usage_count',
        'expires_at',
    ];
}
