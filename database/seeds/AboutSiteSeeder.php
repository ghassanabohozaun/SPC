<?php

namespace Database\Seeders;

use App\Models\AboutSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSite::create([
            'whom_ar' => '',
            'whom_en' => '',
            'contact_us_ar' => '',
            'contact_us_en' => '',
            'whom_brochure' => '',
            'who_are_we_ar' => '',
            'who_are_we_en' => '',
            'who_are_we_profile' => '',
            'about_doctor_en' => '',
            'about_doctor_ar' => '',
            'why_chose_us_title_en' => '',
            'why_chose_us_title_ar' => '',
            'why_chose_us_details_en' => '',
            'why_chose_us_details_ar' => '',
            'why_chose_us_photo' => '',
        ]);
    }
}
