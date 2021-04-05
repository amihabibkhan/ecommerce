<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // relation with order details table
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // relation with district table
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
