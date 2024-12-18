<?php

use Database\Seeders\ArticleSeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\MyNewsSeeder;
use Database\Seeders\PhotoAlbumSeeder;
use Database\Seeders\PostersSeeder;
use Database\Seeders\PublicationsSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SectionsSeeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\SlidersSeeder;
use Database\Seeders\TestimonialsSeeder;
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
            ServicesSeeder::class,
            TestimonialsSeeder::class,
            ArticleSeeder::class,
            PublicationsSeeder::class,
            SectionsSeeder::class,
            MyNewsSeeder::class,
            PostersSeeder::class,
        ]);
    }
}
