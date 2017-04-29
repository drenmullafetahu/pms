<?php

use Illuminate\Database\Seeder;
use Models\Projects;
use Illuminate\Support\Facades\DB;
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
