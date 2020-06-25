<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Location extends Model
{

    public function location()
    {
        return $this->hasMany('App\Location');
    }

    public function category()
    {
        return $this->hasMany('App\Category');
    }
}
