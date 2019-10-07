<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);   
        $this->call([
            AlunosTableSeeder::class,
            StatusesTableSeeder::class,
            TiposTableSeeder::class,
            SubtiposTableSeeder::class,
            CursosTableSeeder::class,
            MatriculasTableSeeder::class
        ]);

    }
}
