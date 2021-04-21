<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order','status');
    }

    public function pendings()
    {
        return $this->orders()->where('status','=', 1);
    }

    public function processings()
    {
        return $this->orders()->where('status','=', 2);
    }

    public function cancels()
    {
        return $this->orders()->where('status','=', 3);
    }

    public function deliverts()
    {
        return $this->orders()->where('status','=', 4);
    }
}
