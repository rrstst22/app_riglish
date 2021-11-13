<?php

namespace Database\Seeders;

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
        $this->call([
            LevelsTableSeeder::class,
            FrequencyTableSeeder::class,
            // WordsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
