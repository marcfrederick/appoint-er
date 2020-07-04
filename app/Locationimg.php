<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locationimg extends Model
{
    protected $fillable = [
        'src'
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
