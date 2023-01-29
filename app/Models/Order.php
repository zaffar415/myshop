<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'product_id',
        'quantity', 
        'delivery_time',
        'address',
        'phone',
        'total',
        'status',
        'exchange_product_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function exchange() {
        return $this->belongsTo(Product::class, 'exchange_product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
