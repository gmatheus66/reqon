<?php

use App\Aluno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Aluno::create([
            'nome'      => 'Nome do aluno',
            'email'     => 'aluno@login',
            'password'  => bcrypt('ipi2019'),
            'data_nasc' => $faker->date(),
            'cpf' => $faker->unique()->numerify('###########'),
        ]);
        factory('App\Aluno',10)->create();
    }
}