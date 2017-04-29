<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'role_id'     => '1',
            'name'     => 'Dren',
            'last_name'     => 'Mullafetahu',
            'email'    => 'dramdrum.m@gmail.com',
            'username' => 'dren.mullafetahu',
            'password' => Hash::make('drenim123'),
            'profession' => 'Computer Engineer',
            'img_src' => '13343082_10210110120736510_319745826725273325_n',
            'active' => '1',
        ));
        User::create(array(
            'role_id'     => '2',
            'name'     => 'Edon',
            'last_name'     => 'Mullafetahu',
            'email'    => 'edon.mullafetahu@gmail.com',
            'username' => 'edon.mullafetahu',
            'password' => Hash::make('drenim321'),
            'profession' => 'Director Ec Ma ndryshe',
            'img_src' => '307802_2546718631965_1869522680_n',
            'active' => '1',
        ));
        User::create(array(
            'role_id'     => '3',
            'name'     => 'Hajrulla',
            'last_name'     => 'Ceku',
            'email'    => 'hajrulla.ceku@gmail.com',
            'username' => 'hajrulla.ceku',
            'password' => Hash::make('drenim1234'),
            'profession' => 'Former Director Ec ma Ndryshe',
            'img_src' => 'oHbHazut',
            'active' => '1',
        ));
    }
}

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        Projects::create(array(
            'title'     => 'Stacionet e Autobusave Prizren',
            'active' => '1',
        ));
        Projects::create(array(
            'title'     => 'Te drejtat e komunitetit Rom',
            'active' => '1',
        ));
    }
}
