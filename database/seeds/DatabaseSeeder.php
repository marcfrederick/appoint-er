<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ContactRequestSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(LocationImgSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CategoryLocationSeeder::class);
        $this->call(SlotSeeder::class);
        $this->call(BookingSeeder::class);
    }
}
