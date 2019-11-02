<?php

use Illuminate\Database\Seeder;
use App\SetorFuncionario;

class SetorFuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	SetorFuncionario::create([
	        'setor_id' => '1',
        	'funcionario_id' => '1'
        ]);
        SetorFuncionario::create([
	        'setor_id' => '2',
        	'funcionario_id' => '2'
        ]);
        SetorFuncionario::create([
	        'setor_id' => '3',
        	'funcionario_id' => '3'
        ]);
        factory('App\SetorFuncionario', 7)->create();
    }
}
