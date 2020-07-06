<?php

use App\CategoryLocation;
use Illuminate\Database\Seeder;

class CategoryLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoryLocation::class, 50)->create();
    }
}
