<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    // relation with parent category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // relation with product table
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
