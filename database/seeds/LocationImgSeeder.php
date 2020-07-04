<?php

use Illuminate\Database\Seeder;

class LocationImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locationimgs')->insert([
            'src' => '//placehold.it/200'
        ]);

        DB::table('locationimgs')->insert([
            'src' => 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fpiq.codeus.net%2Fstatic%2Fmedia%2Fuserpics%2Fpiq_66223.png&f=1&nofb=1'
        ]);
    }
}
