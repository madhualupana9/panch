<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Full access to admin panel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userRole = DB::table('roles')->insertGetId([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Limited access to admin panel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create test admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@paanch.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole,
            'is_active' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create test regular user
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'user@paanch.com',
            'password' => Hash::make('user123'),
            'role_id' => $userRole,
            'is_active' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
