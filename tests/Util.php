<?php
declare(strict_types=1);

namespace Tests;

use App\User;

class Util
{
    /**
     * Creates a new admin user.
     *
     * @return \App\User
     */
    public static function createAdmin()
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@htwg-konstanz.de',
            'password' => '$2y$10$Hw6UZhvBiEhMCS1jkG.Oc.Ht7q4WcHoATcPrcYSdxt7bAM9xoLpWW',
            'role' => 'admin'
        ]);
    }
}
