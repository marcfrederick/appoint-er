<?php

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
        DB::table('category_location')->insert([
            'location_id' => '1',
            'category_id' => '3'
        ]);

        DB::table('category_location')->insert([
            'location_id' => '2',
            'category_id' => '1'
        ]);

        DB::table('category_location')->insert([
            'location_id' => '2',
            'category_id' => '2'
        ]);
    }
}
