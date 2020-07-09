<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locationimg extends Model
{
    protected $fillable = [
        'location_id',
        'src'
    ];

    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

}
