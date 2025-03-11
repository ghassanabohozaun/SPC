<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class FAQFactory extends Factory
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
            'question_en' => $faker->sentence(),
            'question_ar' => $faker->sentence(),
            'answer_en' => $faker->paragraph(),
            'answer_ar' => $faker->paragraph(),
            'status' => 'on',
            'language'=>'ar_en',
        ];
    }
}
