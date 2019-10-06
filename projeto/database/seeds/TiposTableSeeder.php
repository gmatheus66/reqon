<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            [
                'descricao' => 'Matricula'
            ],
            [
                'descricao' => 'Curso'
            ],
            [
                'descricao' => 'Outros'
            ]
        ]);
    }
}
