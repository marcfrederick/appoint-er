<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @var bool Disable model timestamps */
    public $timestamps = false;

    public $fillable = ['location_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }
}
