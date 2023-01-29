<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name', 'user_id', 
        'description', 'category',
        'price', 'image',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
