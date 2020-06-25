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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Address>
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category_locations()
    {
        return $this->hasMany('App\Category_Location');
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
