<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @var array<string> */
    protected $fillable = [
        'title', 'description', 'address_id', 'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Address>
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\User>
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param int $number
     * @return \Illuminate\Support\Collection<Location>
     */
    public function getRecentlyUpdated($number)
    {
        return $this->orderBy('updated_at', 'desc')
            ->take($number)
            ->get();
    }
}
