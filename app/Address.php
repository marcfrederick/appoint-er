<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function location() {
        return $this->belongsTo('App\Location');
    }
}
