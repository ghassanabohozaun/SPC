<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class PhotoAlbumFactory extends Factory
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
            'status' => 'on',
            'year' => '2024',
            'main_photo' => '',
            'language' => 'ar_en',
        ];
    }
}
