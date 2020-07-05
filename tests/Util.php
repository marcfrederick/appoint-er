<?php
declare(strict_types=1);

namespace Tests;

use App\Booking;
use App\Location;
use App\Slot;
use App\User;

class Util
{
    /**
     * Creates a new admin user.
     *
     * @return \App\User
     */
    public static function createAdmin(): User
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@htwg-konstanz.de',
            'password' => '$2y$10$Hw6UZhvBiEhMCS1jkG.Oc.Ht7q4WcHoATcPrcYSdxt7bAM9xoLpWW',
            'role' => 'admin'
        ]);
    }

    public static function createUser(): User
    {
        return factory(User::class)->create();
    }

    public static function createLocation(?User $user = null): Location
    {
        return factory(Location::class)->create([
            'user_id' => $user ?? self::createUser()->id,
        ]);
    }

    public static function createSlot(?Location $location = null): Slot
    {
        return factory(Slot::class)->create([
            'location_id' => ($location ?? self::createLocation())->id,
        ]);
    }

    public static function createBooking(?Slot $slot = null, ?User $user = null): Booking
    {
        return factory(Booking::class)->create([
            'slot_id' => $slot ?? self::createSlot(),
            'user_id' => $user ?? self::createUser(),
        ]);
    }
}
