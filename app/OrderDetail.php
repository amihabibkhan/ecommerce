<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    // relation with product details
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
