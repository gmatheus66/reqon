<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
    return [
       
        'matricula' => $faker->regexify('20[0-1][0-9][A-Z]{5}[0-9]{4}'),
        'ano' => $faker->year($max = 'now'),
        'semestre' => $faker->randomElement(['1 Periodo', '2 Periodo', '3 Periodo', '4 Periodo']),
        'status' => $faker->randomElement(['Cursando','Trancado','Concluido']),
        'curso_id'=> $faker->numberBetween(1,3),
        'aluno_id' => $faker->numberBetween(1,10)
     
    ];
});
