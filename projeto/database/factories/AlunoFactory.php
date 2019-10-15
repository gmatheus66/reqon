<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aluno;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data_nasc' => $faker->date(),
        'email' => $faker->email,
        'cpf' => $faker->unique()->numerify('###########'),
        'password' => Hash::make($faker->lexify('ipi2019'))
    ];
});
