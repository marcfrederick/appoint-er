<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@htwg-konstanz.de',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        factory(\App\User::class, 50)->create();
    }
}
