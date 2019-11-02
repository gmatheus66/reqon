<?php

use App\Matricula;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
    	$faker = Faker::create();
        Matricula::create([
	        'matricula' => '2008INFRC2436',
	        'ano' => '2008',
	        'semestre' => $faker->randomElement(['1 Periodo', '2 Periodo', '3 Periodo', '4 Periodo']),
	        'status' => $faker->randomElement(['Cursando','Trancado','Concluido']),
	        'curso_id'=> $faker->numberBetween(1,3),
	        'aluno_id' => 2
        ]);
    }
}
