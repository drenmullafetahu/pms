<?php

use Illuminate\Database\Seeder;
use Models\Languages;
class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        Languages::create(array(
            'title'     => 'Shqip',
            'code'     => 'sq',
            'ord'     => '0',
            'visible'    => '1',
        ));
        Languages::create(array(
            'title'     => 'English',
            'code'     => 'en',
            'ord'     => '1',
            'visible'    => '1',
        ));
    }
}
