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
        'food_ids' => 'json', // This ensures that the food_ids attribute is cast to JSON
    ];

    // Define relationships if needed (for example, if you have a User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
