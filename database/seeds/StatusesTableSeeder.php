<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'situacao' => 'Deferido'
            ],
            [
                'situacao' => 'Indeferido'
            ],
            [
                'situacao' => 'Parcialmente deferido'
            ]
        ]);
    }
}
