<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
