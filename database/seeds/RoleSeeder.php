<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role
        Role::create([
            'role_name_ar' => 'مشرف عام',
            'role_name_en' => 'supervisor',
            'permissions' => json_encode([
                'dashboard',
                'settings',
                'admins',
                'roles',
                'users',
                // 'support-center',
                // 'reports',
                // 'articles',
                // 'landing-page',
                // 'projects',
                // 'testimonials',
                // 'publications',
                // 'videos',
                // 'photos',
                // 'yearly-reports',
                // 'abouts',
                // 'teams',
                'faq'
            ]),
        ]);
    }
}
