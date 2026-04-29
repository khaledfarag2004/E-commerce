<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'discount_percentage',
        'start_date',
        'end_date',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

