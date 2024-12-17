<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $title_ar = ['المقالات', 'الكتب', 'البوسترات', 'الأخبار',];
        $title_en = ['Articles', 'Books', 'Posters', 'News'];

        for ($i = 0; $i < count($title_ar); $i++) {
            Section::create([
                'title_en' => $title_en[$i],
                'title_ar' => $title_ar[$i],
                'publications_no' => 0,
                'language' => 'ar_en',
                'status' => 'on',
            ]);
        }
    }
}
