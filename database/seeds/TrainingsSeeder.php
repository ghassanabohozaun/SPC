<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TrainingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Training::factory()->count(5)->create();

        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Training::create(
                [
                    'title_ar' => $faker->sentence() . $i,
                    'title_en' => $faker->sentence() . $i,
                    'status' => 'on',
                    'photo' => '',
                    'started_date' => now(),
                    'language' => 'en',
                ]
            );
        }
    }
}
