<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
        'stock',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default-watch.jpg');
    }

    public function reduceStock($quantity)
    {
        $this->decrement('stock', $quantity);
    }

    public function isAvailable($quantity = 1)
    {
        return $this->stock >= $quantity;
    }
}