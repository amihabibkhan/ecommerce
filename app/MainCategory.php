<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $guarded = [];

    // relation with category table
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    // relation with product table
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
