<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed navigation items
        $navItems = [
            ['name' => 'Home', 'slug' => 'home', 'url' => '/', 'order' => 1, 'location' => 'header'],
            ['name' => 'About Us', 'slug' => 'about', 'url' => '/about', 'order' => 2, 'location' => 'header'],
            ['name' => 'Services', 'slug' => 'services', 'url' => '/services', 'order' => 3, 'location' => 'header'],
            ['name' => 'Technology', 'slug' => 'technology', 'url' => '/technology', 'order' => 4, 'location' => 'header'],
            ['name' => 'Clients', 'slug' => 'clients', 'url' => '/clients', 'order' => 5, 'location' => 'header'],
            ['name' => 'Projects', 'slug' => 'projects', 'url' => '/projects', 'order' => 6, 'location' => 'header'],
            ['name' => 'Careers', 'slug' => 'careers', 'url' => '/careers', 'order' => 7, 'location' => 'header'],
            ['name' => 'News', 'slug' => 'news', 'url' => '/news', 'order' => 8, 'location' => 'header'],
            ['name' => 'Contact', 'slug' => 'contact', 'url' => '/contact', 'order' => 9, 'location' => 'header'],
        ];

        foreach ($navItems as $item) {
            DB::table('navigation_items')->insert(array_merge($item, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Seed content sections
        $contentSections = [
            [
                'section_key' => 'hero',
                'title' => 'Building Tomorrow\'s Infrastructure Today',
                'subtitle' => 'Leading Infrastructure & Power Solutions Provider',
                'content' => 'Paanchajanya Reality Private Limited is a Class-I Contractor registered with the Telangana Government, specializing in comprehensive infrastructure and power projects.',
                'is_active' => true,
            ],
            [
                'section_key' => 'about',
                'title' => 'About Paanchajanya Reality',
                'subtitle' => 'Excellence in Infrastructure Development',
                'content' => 'Established in 2010 and operational since FY2017, we bring expertise in civil construction, electrical installations, and project management.',
                'is_active' => true,
            ],
        ];

        foreach ($contentSections as $section) {
            DB::table('content_sections')->insert(array_merge($section, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Seed site settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Paanchajanya Reality', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Building Tomorrow\'s Infrastructure Today', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@paanch.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+91 1234567890', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Hyderabad, Telangana, India', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/Paanchajanya Reality', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/Paanchajanya Reality', 'type' => 'text', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/Paanchajanya Reality', 'type' => 'text', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
