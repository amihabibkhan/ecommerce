<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    // relation with sub_category table
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // relation with writer table
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
    // relation with publication table
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
