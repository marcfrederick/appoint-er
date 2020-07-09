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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Category>
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryLocation()
    {
        return $this->hasMany(CategoryLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Slot>
     */
    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection<Slot>
     */
    public function getFutureAvailableSlotsAttribute()
    {
        return $this->slots()
            ->whereDate('start', '>', now())
            ->doesntHave('booking')
            ->get();
    }
}
