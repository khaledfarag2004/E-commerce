<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
