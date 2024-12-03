<?php

use App\Models\FixedText;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class FixedTextsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        FixedText::create([
            'project_details_ar'  =>$faker->sentence,
            'project_details_en' =>$faker->sentence,
            'about_association_title_ar' =>$faker->sentence,
            'about_association_title_en' =>$faker->sentence,
            'about_association_details_ar' =>$faker->paragraph(10),
            'about_association_details_en' =>$faker->paragraph(10),
            'about_association_founders_count' =>$faker->numberBetween(0, 300),
            'about_association_beneficiaries_count' =>$faker->numberBetween(0, 5000),
            'founders_title_ar' =>$faker->sentence,
            'founders_title_en' =>$faker->sentence,
            'blog_title_ar' =>$faker->sentence,
            'blog_title_en' =>$faker->sentence,
            'testimonials_title_ar' =>$faker->sentence,
            'testimonials_title_en' =>$faker->sentence,
            'testimonials_details_ar' =>$faker->paragraph(10),
            'testimonials_details_en' =>$faker->paragraph(10),
            'counter_icon_1' =>'charity-icon.jpg',
            'counter_number_1' =>$faker->numberBetween(0, 300),
            'counter_name_1_ar' =>'عداد رقم 1',
            'counter_name_1_en' =>'Counter Number 1',
            'counter_icon_2' =>'charity-icon.jpg',
            'counter_number_2' =>$faker->numberBetween(0, 200),
            'counter_name_2_ar' =>'عداد رقم 1',
            'counter_name_2_en' =>'Counter Number 2',
            'counter_icon_3' =>'charity-icon.jpg',
            'counter_number_3' =>$faker->numberBetween(0, 100),
            'counter_name_3_ar' =>'عداد رقم 3',
            'counter_name_3_en' =>'Counter Number 3',
            'counter_icon_4' =>'charity-icon.jpg',
            'counter_number_4' =>$faker->numberBetween(0, 500),
            'counter_name_4_ar' =>'عداد رقم 4',
            'counter_name_4_en' =>'Counter Number 4',
        ]);
    }
}
