<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    /** @var array<string> */
    protected $fillable = ['start', 'duration', 'location_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Location>
     */
    public function location()
    {
        return $this->belongsToMany(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Booking>
     */
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
