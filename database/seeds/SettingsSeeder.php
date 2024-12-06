<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'site_name_ar' => 'ايثار',
            'site_name_en' => 'Ethar',
            'site_lang_ar' => '',
            'site_lang_en' => 'on',
        ]);
    }
}
