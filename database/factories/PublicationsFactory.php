<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publications>
 */
class PublicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_ar'   =>Str::random(10),
            'title_en'   =>Str::random(10),
            'details_ar' =>Str::random(150),
            'details_en' =>Str::random(150),
            'status'     =>'on',
            'photo'      =>'1673465631.jpg',
            'language'   =>'ar',
            'file'       =>null,
            'date'       =>now(),
            'writer'     =>Str::random(15),
            'type'       =>'ScientificArticles',
        ];
    }
}
