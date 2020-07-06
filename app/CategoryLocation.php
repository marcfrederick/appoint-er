<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLocation extends Model
{
    protected $table = 'category_location';
    protected $fillable = ['category_id', 'location_id'];
}
