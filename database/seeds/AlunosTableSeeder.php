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
            'nome'      => 'Aluno1',
            'email'     => 'aluno@login',
            'password'  => bcrypt('ipi2019'),
            'data_nasc' => $faker->date(),
            'cpf' => $faker->unique()->numerify('###########'),
        ]);
        
        Aluno::create([
            'nome'      => 'Aluno2',
            'email'     => 'aluno2@login',
            'password'  => bcrypt('ipi2019'),
            'data_nasc' => $faker->date(),
            'cpf' => $faker->unique()->numerify('###########'),
        ]);
        factory('App\Aluno',8)->create();
    }
}