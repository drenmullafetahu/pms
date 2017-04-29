<?php

use Illuminate\Database\Seeder;
use Models\Roles;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Roles::create(array(
            'id'     => '1',
            'title'     => 'Admin',
        ));
        Roles::create(array(
            'id'     => '2',
            'title'     => 'Staff',
        ));
        Roles::create(array(
            'id'     => '3',
            'title'     => 'Guest',
        ));
    }
}
