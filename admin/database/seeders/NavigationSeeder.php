<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavigationItem;
use Illuminate\Support\Facades\DB;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing navigation items
        DB::table('navigation_items')->truncate();

        // Header Navigation Items
        $headerItems = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'url' => '/',
                'order' => 1,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About Us',
                'slug' => 'about',
                'url' => '/about',
                'order' => 2,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Services',
                'slug' => 'services',
                'url' => '/services',
                'order' => 3,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'url' => '/technology',
                'order' => 4,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Clients',
                'slug' => 'clients',
                'url' => '/clients',
                'order' => 5,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Projects',
                'slug' => 'projects',
                'url' => '/projects',
                'order' => 6,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Careers',
                'slug' => 'careers',
                'url' => '/careers',
                'order' => 7,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'url' => '/news',
                'order' => 8,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'url' => '/contact',
                'order' => 9,
                'is_active' => true,
                'location' => 'header',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert header navigation items
        foreach ($headerItems as $item) {
            NavigationItem::create($item);
        }

        // Footer Navigation Items
        $footerItems = [
            [
                'name' => 'About',
                'slug' => 'about',
                'url' => '/about',
                'order' => 1,
                'is_active' => true,
                'location' => 'footer',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Services',
                'slug' => 'services',
                'url' => '/services',
                'order' => 2,
                'is_active' => true,
                'location' => 'footer',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Projects',
                'slug' => 'projects',
                'url' => '/projects',
                'order' => 3,
                'is_active' => true,
                'location' => 'footer',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Careers',
                'slug' => 'careers',
                'url' => '/careers',
                'order' => 4,
                'is_active' => true,
                'location' => 'footer',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'url' => '/contact',
                'order' => 5,
                'is_active' => true,
                'location' => 'footer',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert footer navigation items
        foreach ($footerItems as $item) {
            NavigationItem::create($item);
        }

        $this->command->info('Navigation items seeded successfully!');
    }
}

