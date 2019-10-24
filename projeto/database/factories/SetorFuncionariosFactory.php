<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SetorFuncionario;
use App\Funcionario;
use App\Setor;
use Faker\Generator as Faker;

$factory->define(SetorFuncionario::class, function (Faker $faker) {
    $setor = Setor::all()->random();
    $func = Funcionario::all()->random();
    return [
        'setor_id' => $setor->id,
        'funcionario_id' => $func->id
    ];
});
