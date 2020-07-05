<?php
declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Location>
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Booking>
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @return bool
     */
    public function isCurrent()
    {
        /** @var User|null $auth_user */
        $auth_user = \Auth::user();
        return !is_null($auth_user) && $this->id === $auth_user->id;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
