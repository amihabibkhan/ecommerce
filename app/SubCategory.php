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
        return $this->belongsToMany('App\Product')->withPivot('sub_category_id');
    }

    // relation with product for index page - 6 product
    public function get_products()
    {
        return $this->belongsToMany('App\Product')->orderBy('id', 'desc')->take(6);
    }
}
