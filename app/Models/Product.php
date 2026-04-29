<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'user_id',
        'category_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function order_items(){
        return $this->hasMany(Order_item::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function carts(){
        return $this->belongsTo(Cart::class);
    }
    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
