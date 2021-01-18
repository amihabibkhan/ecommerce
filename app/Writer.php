<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $guarded = [];

    // relation with product table
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
