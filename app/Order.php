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

    // relation with district table
    public function shipping_district()
    {
        return $this->belongsTo(District::class,'shipping_district_id');
    }

    // relation with district table
    public function updator()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
