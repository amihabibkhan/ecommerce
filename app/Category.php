<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // relation with parent category
    public function main_category()
    {
        return $this->belongsTo('App\MainCategory');
    }

    // relation with sub category
    public function sub_categories()
    {
        return $this->hasMany('App\SubCategory');
    }

    // relation with product table
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('category_id');
    }

    // relation with product for index page - 6 product
    public function get_products()
    {
        return $this->belongsToMany('App\Product')->orderBy('id', 'desc')->take(6);
    }
}
