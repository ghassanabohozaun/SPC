<?php

namespace Database\Factories;

use App\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ArticleFactory extends Factory
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

        $title_en = $faker->sentence();
        $title_ar = $faker->sentence();

        return [
            'title_en_slug' => slug($title_en),
            'title_ar_slug' => slug($title_ar),
            'title_en' => $title_en,
            'title_ar' => $title_ar,
            'abstract_en' => $faker->sentence(20),
            'abstract_ar' => $faker->sentence(20),
            'publish_date' => now(),
            'publisher_name' => $faker->sentence(3),
            'views' => '20',
            'status' => 'on',
            'photo' => '',
            'language' => 'ar_en',
        ];
    }
}
