<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @var array<string> */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Location>+
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }
}
