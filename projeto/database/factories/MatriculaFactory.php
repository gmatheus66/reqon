<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
       
    $ano = $faker->regexify('20[0-1][0-9]');
    $campus = $faker->randomElement(['INFPL','INFRC','INFIG']);
    $numero_matri = $faker->regexify('[0-9]{4}');
    $matricula = $ano . $campus . $numero_matri; 


    return [
       
        'matricula' => $matricula,
        'ano' => $ano,
        'semestre' => $faker->randomElement(['1 Periodo', '2 Periodo', '3 Periodo', '4 Periodo']),
        'status' => $faker->randomElement(['Cursando','Trancado','Concluido']),
        'curso_id'=> $faker->numberBetween(1,3),
        'aluno_id' => $faker->numberBetween(1,10)
     
    ];
});
