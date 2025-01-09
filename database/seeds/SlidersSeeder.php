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
                'title_en' => $faker->sentence(5) . ' | ' .$i,
                'title_ar' => $faker->sentence(5). ' | ' .$i,
                'details_en' => $faker->sentence(20),
                'details_ar' => $faker->sentence(20),
                'order' => rand(1, 2),
                'url_en' => '',
                'url_ar' => '',
                'status' => 'on',
                'details_status' => 'show',
                'button_status' => 'show',
                'photo' => 'slider-'.$i.'.jpg',
                'language' => 'ar_en',
            ]);
        }

    }
}
