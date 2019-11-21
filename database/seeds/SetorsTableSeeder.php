<?php

use Illuminate\Database\Seeder;

class SetorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setors')->insert([
            [
                'nome' => 'CRADT'
            ],
            [
                'nome' => 'DAEE'
            ],
            [
                'nome' => 'Coordenação de curso'
            ]
        ]);
    }
}
