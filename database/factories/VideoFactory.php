<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class VideoFactory extends Factory
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
            'title_en' => $faker->sentence(),
            'title_ar' => $faker->sentence(),
            'link' => 'DzwIRzD7da4',
            'duration' => '10',
            'added_date' => now(),
            'status' => 'on',
            'photo' => '',
            'language' => 'ar_en',
        ];
    }
}
