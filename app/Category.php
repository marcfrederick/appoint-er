<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function category_locations()
    {
        return $this->belongsToMany('App\Category_Location');
    }
}
