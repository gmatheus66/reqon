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
        $pw = Hash::make($faker->lexify('ipi2019'));

        DB::transaction(function() use ($pw) {
            factory('App\Aluno',1000)->create([
                'password' => $pw
            ])->each(function($aluno) {
                $aluno->matricula()->save(factory('App\Matricula', rand(1, 3)));
            });
        });
    }
}
