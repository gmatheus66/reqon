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
        SetorFuncionario::create([
            'setor_id' => '1',
            'funcionario_id' => '4'
        ]);
        SetorFuncionario::create([
            'setor_id' => '2',
            'funcionario_id' => '5'
        ]);
        SetorFuncionario::create([
            'setor_id' => '3',
            'funcionario_id' => '6'
        ]);
        SetorFuncionario::create([
            'setor_id' => '1',
            'funcionario_id' => '7'
        ]);
        SetorFuncionario::create([
            'setor_id' => '2',
            'funcionario_id' => '8'
        ]);
        SetorFuncionario::create([
            'setor_id' => '3',
            'funcionario_id' => '9'
        ]);
        SetorFuncionario::create([
            'setor_id' => '1',
            'funcionario_id' => '10'
        ]);


        //factory('App\SetorFuncionario', 7)->create();
    }
}
