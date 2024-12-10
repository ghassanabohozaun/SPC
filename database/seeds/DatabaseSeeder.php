<?php

use Database\Seeders\FaqSeeder;
use Database\Seeders\PhotoAlbumSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SlidersSeeder;
use Database\Seeders\TrainingsSeeder;
use Database\Seeders\VideosSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([
            SettingsSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            TrainingsSeeder::class,
            FaqSeeder::class,
            VideosSeeder::class,
            PhotoAlbumSeeder::class,
            SlidersSeeder::class,
        ]);


        // // create about types
        // $abouts_en = ['Rationale', 'Who We Are', 'Work Ethics', 'Constitution'];
        // $abouts_ar = ['المنطق', 'من نحن', 'اخلاقيات العمل', 'الدستور'];

        // for ($i = 0; $i < count($abouts_en); $i++) {
        //     AboutType::create([
        //         'name_en' => $abouts_en[$i],
        //         'name_ar' => $abouts_ar[$i],
        //     ]);
        // }
    }
}
