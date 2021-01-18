<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    protected $guarded = [];

    // relation with category table
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    // relation with sub category table
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory', 'category_id', 'id');
    }
}
