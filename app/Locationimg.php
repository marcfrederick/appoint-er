<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locationimg extends Model
{
    /** @var array<string> */
    protected $fillable = ['location_id', 'src'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Location>
     */
    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

}
