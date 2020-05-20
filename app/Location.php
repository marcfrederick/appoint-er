<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'title', 'description', 'address_id', 'user_id', 'tags'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    /**
     * @param $number
     * @return \Illuminate\Support\Collection
     */
    public function getRecentlyUpdated($number)
    {
        return $this->orderBy('updated_at', 'desc')
            ->take($number)
            ->get();
    }
}
