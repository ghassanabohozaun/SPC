<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
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
            'type'       =>'current',
        ];
    }
}
