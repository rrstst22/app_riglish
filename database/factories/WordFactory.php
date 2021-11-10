<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'en' => $this->faker->word,
            'jp' => 'テスト',
            'level_id' => 1,
            'frequency_id' => 1,
        ];
    }
}
