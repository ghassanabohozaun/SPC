<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class SliderFactory extends Factory
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
            'details_en' => $faker->paragraph(),
            'details_ar' => $faker->sentence(),
            'order' => rand(1, 15),
            'url_en' => '',
            'url_ar' => '',
            'status' => 'on',
            'details_status' => 'hide',
            'button_status' => 'hide',
            'photo' => '',
            'language' => 'ar_en',
        ];
    }
}
