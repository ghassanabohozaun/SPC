<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();


        for($i = 1 ; $i <= 2 ; $i++){
            Slider::create( [
                'title_en' => $faker->sentence(10),
                'title_ar' => $faker->sentence(10),
                'details_en' => $faker->sentence(50),
                'details_ar' => $faker->sentence(50),
                'order' => rand(1, 2),
                'url_en' => '',
                'url_ar' => '',
                'status' => 'on',
                'details_status' => 'hide',
                'button_status' => 'hide',
                'photo' => 'slider-'.$i.'.jpg',
                'language' => 'ar_en',
            ]);
        }

    }
}
