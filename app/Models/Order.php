<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'food_ids',
        'status',
        'total_price',
    ];

    protected $casts = [
        'food_ids' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
