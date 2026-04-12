<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // Dashboard
            ['name' => 'dashboard.view', 'display_name' => 'View Dashboard', 'description' => 'Access to admin dashboard', 'module' => 'dashboard'],

            // Projects
            ['name' => 'projects.view', 'display_name' => 'View Projects', 'description' => 'View projects list', 'module' => 'projects'],
            ['name' => 'projects.create', 'display_name' => 'Create Projects', 'description' => 'Create new projects', 'module' => 'projects'],
            ['name' => 'projects.edit', 'display_name' => 'Edit Projects', 'description' => 'Edit existing projects', 'module' => 'projects'],
            ['name' => 'projects.delete', 'display_name' => 'Delete Projects', 'description' => 'Delete projects', 'module' => 'projects'],

            // News
            ['name' => 'news.view', 'display_name' => 'View News', 'description' => 'View news articles', 'module' => 'news'],
            ['name' => 'news.create', 'display_name' => 'Create News', 'description' => 'Create news articles', 'module' => 'news'],
            ['name' => 'news.edit', 'display_name' => 'Edit News', 'description' => 'Edit news articles', 'module' => 'news'],
            ['name' => 'news.delete', 'display_name' => 'Delete News', 'description' => 'Delete news articles', 'module' => 'news'],

            // Services
            ['name' => 'services.view', 'display_name' => 'View Services', 'description' => 'View services list', 'module' => 'services'],
            ['name' => 'services.create', 'display_name' => 'Create Services', 'description' => 'Create new services', 'module' => 'services'],
            ['name' => 'services.edit', 'display_name' => 'Edit Services', 'description' => 'Edit existing services', 'module' => 'services'],
            ['name' => 'services.delete', 'display_name' => 'Delete Services', 'description' => 'Delete services', 'module' => 'services'],

            // Technologies
            ['name' => 'technologies.view', 'display_name' => 'View Technologies', 'description' => 'View technologies list', 'module' => 'technologies'],
            ['name' => 'technologies.create', 'display_name' => 'Create Technologies', 'description' => 'Create new technologies', 'module' => 'technologies'],
            ['name' => 'technologies.edit', 'display_name' => 'Edit Technologies', 'description' => 'Edit existing technologies', 'module' => 'technologies'],
            ['name' => 'technologies.delete', 'display_name' => 'Delete Technologies', 'description' => 'Delete technologies', 'module' => 'technologies'],

            // Clients
            ['name' => 'clients.view', 'display_name' => 'View Clients', 'description' => 'View clients list', 'module' => 'clients'],
            ['name' => 'clients.create', 'display_name' => 'Create Clients', 'description' => 'Create new clients', 'module' => 'clients'],
            ['name' => 'clients.edit', 'display_name' => 'Edit Clients', 'description' => 'Edit existing clients', 'module' => 'clients'],
            ['name' => 'clients.delete', 'display_name' => 'Delete Clients', 'description' => 'Delete clients', 'module' => 'clients'],

            // Careers
            ['name' => 'careers.view', 'display_name' => 'View Careers', 'description' => 'View career listings', 'module' => 'careers'],
            ['name' => 'careers.create', 'display_name' => 'Create Careers', 'description' => 'Create career listings', 'module' => 'careers'],
            ['name' => 'careers.edit', 'display_name' => 'Edit Careers', 'description' => 'Edit career listings', 'module' => 'careers'],
            ['name' => 'careers.delete', 'display_name' => 'Delete Careers', 'description' => 'Delete career listings', 'module' => 'careers'],

            // Job Applications
            ['name' => 'job-applications.view', 'display_name' => 'View Job Applications', 'description' => 'View job applications', 'module' => 'job-applications'],
            ['name' => 'job-applications.manage', 'display_name' => 'Manage Job Applications', 'description' => 'Manage job application status', 'module' => 'job-applications'],
            ['name' => 'job-applications.delete', 'display_name' => 'Delete Job Applications', 'description' => 'Delete job applications', 'module' => 'job-applications'],

            // Contact Submissions
            ['name' => 'contacts.view', 'display_name' => 'View Contact Submissions', 'description' => 'View contact form submissions', 'module' => 'contacts'],
            ['name' => 'contacts.manage', 'display_name' => 'Manage Contact Submissions', 'description' => 'Manage contact submissions', 'module' => 'contacts'],
            ['name' => 'contacts.delete', 'display_name' => 'Delete Contact Submissions', 'description' => 'Delete contact submissions', 'module' => 'contacts'],

            // Content Management
            ['name' => 'content.view', 'display_name' => 'View Content', 'description' => 'View content sections', 'module' => 'content'],
            ['name' => 'content.edit', 'display_name' => 'Edit Content', 'description' => 'Edit content sections', 'module' => 'content'],

            // Navigation
            ['name' => 'navigation.view', 'display_name' => 'View Navigation', 'description' => 'View navigation items', 'module' => 'navigation'],
            ['name' => 'navigation.create', 'display_name' => 'Create Navigation', 'description' => 'Create navigation items', 'module' => 'navigation'],
            ['name' => 'navigation.edit', 'display_name' => 'Edit Navigation', 'description' => 'Edit navigation items', 'module' => 'navigation'],
            ['name' => 'navigation.delete', 'display_name' => 'Delete Navigation', 'description' => 'Delete navigation items', 'module' => 'navigation'],

            // Settings
            ['name' => 'settings.view', 'display_name' => 'View Settings', 'description' => 'View system settings', 'module' => 'settings'],
            ['name' => 'settings.edit', 'display_name' => 'Edit Settings', 'description' => 'Edit system settings', 'module' => 'settings'],

            // User Management
            ['name' => 'users.view', 'display_name' => 'View Users', 'description' => 'View users list', 'module' => 'users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'description' => 'Create new users', 'module' => 'users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'description' => 'Edit existing users', 'module' => 'users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'description' => 'Delete users', 'module' => 'users'],

            // Role Management
            ['name' => 'roles.view', 'display_name' => 'View Roles', 'description' => 'View roles list', 'module' => 'roles'],
            ['name' => 'roles.create', 'display_name' => 'Create Roles', 'description' => 'Create new roles', 'module' => 'roles'],
            ['name' => 'roles.edit', 'display_name' => 'Edit Roles', 'description' => 'Edit existing roles', 'module' => 'roles'],
            ['name' => 'roles.delete', 'display_name' => 'Delete Roles', 'description' => 'Delete roles', 'module' => 'roles'],

            // Sliders
            ['name' => 'sliders.view', 'display_name' => 'View Sliders', 'description' => 'View homepage sliders', 'module' => 'sliders'],
            ['name' => 'sliders.create', 'display_name' => 'Create Sliders', 'description' => 'Create new homepage sliders', 'module' => 'sliders'],
            ['name' => 'sliders.edit', 'display_name' => 'Edit Sliders', 'description' => 'Edit existing homepage sliders', 'module' => 'sliders'],
            ['name' => 'sliders.delete', 'display_name' => 'Delete Sliders', 'description' => 'Delete homepage sliders', 'module' => 'sliders'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }

        // Create roles
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            [
                'display_name' => 'Administrator',
                'description' => 'Full access to all system features'
            ]
        );

        $editorRole = Role::firstOrCreate(
            ['name' => 'editor'],
            [
                'display_name' => 'Content Editor',
                'description' => 'Can manage content, projects, and news'
            ]
        );

        $userRole = Role::firstOrCreate(
            ['name' => 'user'],
            [
                'display_name' => 'User',
                'description' => 'Limited access to specific features'
            ]
        );

        // Assign all permissions to admin role
        $adminRole->permissions()->sync(Permission::all()->pluck('id'));

        // Assign specific permissions to editor role
        $editorPermissions = Permission::whereIn('module', [
            'dashboard', 'projects', 'news', 'services', 'technologies',
            'clients', 'careers', 'content', 'sliders'
        ])->pluck('id');
        $editorRole->permissions()->sync($editorPermissions);

        // Assign basic permissions to user role
        $userPermissions = Permission::whereIn('name', [
            'dashboard.view', 'projects.view', 'news.view', 'services.view'
        ])->pluck('id');
        $userRole->permissions()->sync($userPermissions);

        // Create default admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@paanch.com'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id,
                'is_active' => true,
            ]
        );

        $this->command->info('Roles, permissions, and admin user created successfully!');
        $this->command->info('Admin login: admin@paanch.com / admin123');
    }
}
