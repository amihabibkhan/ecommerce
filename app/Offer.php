<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];

    // relation with product table
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
