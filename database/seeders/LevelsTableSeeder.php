<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert([
            [
              'level' => 'novice',
            ],
            [
              'level' => 'intermediate',
            ],
            [
              'level' => 'advanced',
            ],
        ]);
    }
}
