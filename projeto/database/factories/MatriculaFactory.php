<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
    return [
        'matricula' => $faker->numberBetween(001, 999),
        'ano' => $faker->year($max = 'now'),
        // 'campus' => $faker->campus
    ];
});
