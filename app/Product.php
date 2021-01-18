<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $guarded = [];

    // relation with main categories
    public function main_categories()
    {
        return $this->belongsToMany('App\MainCategory');
    }

    // relation with  categories
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    // relation with  sub_categories
    public function sub_categories()
    {
        return $this->belongsToMany('App\SubCategory');
    }

    // relation with  tag
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    // relation with  size
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

    // relation with  size
    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    // relation with product images
    public function product_images()
    {
        return $this->hasMany('App\ProductImage');
    }

    // relation with page images
    public function page_images()
    {
        return $this->hasMany('App\PageImage');
    }

    // relation with writer table
    public function writer()
    {
        return $this->belongsTo('App\Writer');
    }

    // relation with publication table
    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }

    // relation with review table
    public function reviews()
    {
        return $this->hasMany('App\Review')->where('status', 2);
    }
}
