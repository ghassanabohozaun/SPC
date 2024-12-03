<?php

use App\Models\AboutType;
use App\Models\Role;
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

        // create role
        Role::create([
            'role_name_ar' => 'supervisor',
            'role_name_en' => 'مشرف عام',
            'permissions' => json_encode([
                'dashboard', 'settings', 'admins', 'roles', 'users', 'support-center', 'reports', 'articles',
                'landing-page', 'projects', 'testimonials', 'publications', 'videos', 'photos', 'yearly-reports',
                'abouts', 'teams','faq'
            ]),
        ]);

        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
            FixedTextsSeeder::class,
        ]);


        // create about types
        $abouts_en = ['Rationale', 'Who We Are', 'Work Ethics', 'Constitution'];
        $abouts_ar = ['المنطق', 'من نحن', 'اخلاقيات العمل', 'الدستور'];

        for ($i = 0; $i < count($abouts_en); $i++) {
            AboutType::create([
                'name_en' => $abouts_en[$i],
                'name_ar' => $abouts_ar[$i],
            ]);
        }

    }
}
