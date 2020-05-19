<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
