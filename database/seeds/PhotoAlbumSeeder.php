<?php

namespace Database\Seeders;

use App\Models\PhotoAlbum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotoAlbum::factory()->count(5)->create();
    }
}
