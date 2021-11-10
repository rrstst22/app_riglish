<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frequency;


class FrequencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frequency::insert([
            [
              'frequency' => 'high',
            ],
            [
              'frequency' => 'middle',
            ],
            [
              'frequency' => 'low',
            ],
        ]);
    }
}
