<?php

namespace Database\Factories;

use App\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class TestimonialFactory extends Factory
{

    use GeneralTrait;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'opinion_ar' => $faker->sentence(30),
            'opinion_en' => $faker->sentence(30),
            'name_ar' => $faker->sentence(12),
            'name_en' => $faker->sentence(12),
            'job_title_ar' => $faker->sentence(2),
            'job_title_en' => $faker->sentence(2),
            'age' => $faker->numberBetween(20, 60),
            'country' => $faker->country(),
            'gender' => 'male',
            'rating' => $faker->numberBetween(1, 5),
            'status' => 'on',
            'photo' => '',
            'language' => 'ar_en',
        ];
    }
}
