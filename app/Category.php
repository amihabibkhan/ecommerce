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
}
