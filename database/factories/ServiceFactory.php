<?php

namespace Database\Factories;

use App\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ServiceFactory extends Factory
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
            'title_en_slug' =>  slug($title_en),
            'title_ar_slug' =>  slug($title_ar),
            'title_en' => $title_en,
            'title_ar' => $title_ar,
            'summary_en' => $faker->sentence(12),
            'summary_ar' => $faker->sentence(12),
            'details_en' => $faker->paragraph(20),
            'details_ar' => $faker->paragraph(20),
            'status' => 'on',
            'is_treatment_area' => 'no',
            'photo' => '',
            'language' => 'ar_en',
        ];
    }
}
