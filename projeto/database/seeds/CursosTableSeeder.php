<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'nome' => 'Informática para Internet',
                'duracao' => 'Um Ano e Meio'
            ],
            [
                'nome' => 'Logística',
                'duracao' => 'Um Ano e Meio'
            ],
            [
                'nome' => 'Gestão da Qualidade',
                'duracao' => 'Três Anos'
            ]
        ]);
    }
}
