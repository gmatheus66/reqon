<?php

use Illuminate\Database\Seeder;
use App\Funcionario;
use Faker\Factory as Faker;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	Funcionario::create([
	        'nome'=> 'CRADT',
	        'cpf'=> $faker->regexify('[0-9]{11}'),
	        'rg_numero'=>$faker->regexify('[0-9]{8}'),
	        'rg_estado'=> $faker->randomElement(["PE", "PB", "AM", "BA"]),
	        'rg_orgao_exp'=> $faker->randomElement(["SDS", "COREN", "CORECON", "DTP", "DST"]),
	        'cargo'=> $faker->randomElement(["Servidor"]),
	        'email'=> 'cradt@login',
	        'password'=> Hash::make("ipi2019"),
	        'telefone'=> $faker->regexify("[0-9]{9}"),
	        'matricula'=>$faker->regexify("[0-9]{10}")
        ]);
        Funcionario::create([
	        'nome'=> 'DAEE',
	        'cpf'=> $faker->regexify('[0-9]{11}'),
	        'rg_numero'=>$faker->regexify('[0-9]{8}'),
	        'rg_estado'=> $faker->randomElement(["PE", "PB", "AM", "BA"]),
	        'rg_orgao_exp'=> $faker->randomElement(["SDS", "COREN", "CORECON", "DTP", "DST"]),
	        'cargo'=> $faker->randomElement(["Servidor"]),
	        'email'=> 'daee@login',
	        'password'=> Hash::make("ipi2019"),
	        'telefone'=> $faker->regexify("[0-9]{9}"),
	        'matricula'=>$faker->regexify("[0-9]{10}")
        ]);
        Funcionario::create([
	        'nome'=> 'Coordenação',
	        'cpf'=> $faker->regexify('[0-9]{11}'),
	        'rg_numero'=>$faker->regexify('[0-9]{8}'),
	        'rg_estado'=> $faker->randomElement(["PE", "PB", "AM", "BA"]),
	        'rg_orgao_exp'=> $faker->randomElement(["SDS", "COREN", "CORECON", "DTP", "DST"]),
	        'cargo'=> $faker->randomElement(["Servidor"]),
	        'email'=> 'coordena@login',
	        'password'=> Hash::make("ipi2019"),
	        'telefone'=> $faker->regexify("[0-9]{9}"),
	        'matricula'=>$faker->regexify("[0-9]{10}")
        ]);
        factory('App\Funcionario', 7)->create();
    }
}
