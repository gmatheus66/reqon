<?php

use App\Matricula;
use Illuminate\Database\Seeder;

class MatriculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Matricula',10)->create();
    }
}
