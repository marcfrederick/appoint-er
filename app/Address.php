<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @var array<string> */
    protected $fillable = [
        'street', 'postcode', 'city', 'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Location>
     */
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * @param string $country
     * @return void
     */
    public function setCountryAttribute($country)
    {
        $this->attributes['country'] = strtoupper($country);
    }
}
