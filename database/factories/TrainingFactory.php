<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'title_ar' => $faker->sentence(),
            'title_en' => $faker->sentence(),
            'status' => 'on',
            'photo' => '',
            'started_date' => now(),
            'language' => 'en',
        ];
    }
}
