<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Funcionario;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Funcionario::class, function (Faker $faker) {
    return [
        'nome'=> $faker->name,
        'cpf'=> $faker->regexify('[0-9]{11}'),
        'rg_numero'=>$faker->regexify('[0-9]{8}'),
        'rg_estado'=> $faker->randomElement(["PE", "PB", "AM", "BA"]),
        'rg_orgao_exp'=> $faker->randomElement(["SDS", "COREN", "CORECON", "DTP", "DST"]),
        'cargo'=> $faker->randomElement(["Professor", "Servidor"]),
        'email'=> $faker->email,
        'password'=> Hash::make("ipi2019"),
        'telefone'=> $faker->regexify("[0-9]{9}"),
        'matricula'=>$faker->regexify("[0-9]{10}")
    ];
});