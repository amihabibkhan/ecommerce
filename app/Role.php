<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany('App\User','role_id');
    }

    public function super_admins()
    {
        return $this->users()->where('role_id','=', 1);
    }

    public function managers()
    {
        return $this->users()->where('role_id','=', 2);
    }

    public function general_users()
    {
        return $this->users()->where('role_id','=', 3);
    }

    public function editors()
    {
        return $this->users()->where('role_id','=', 4);
    }
}
