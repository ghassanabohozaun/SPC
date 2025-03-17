<?php

namespace Database\Seeders;

use App\Models\AboutSpc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutSpcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        $title_en = ['Definition', 'Aims', 'Methods', 'Sessions', 'Rationale', 'Success', 'Research'];
        $title_ar = ['تعريف', 'الأهداف', 'الأساليب', 'الجلسات', 'المنطق', 'النجاح', 'البحث'];

        for ($i = 0; $i < count($title_en); $i++) {
            AboutSpc::create([
                'title_en' => $title_en[$i],
                'title_ar' => $title_ar[$i],
                'details_ar' => '',
                'details_en' => '',
                'language' => 'ar_en',
                'status' => 'on',
            ]);
        }
    }
}
