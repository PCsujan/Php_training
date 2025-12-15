<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::firstOrCreate(['name' => 'create posts', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit posts', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete posts', 'guard_name' => 'web']);

        Permission::firstOrCreate(['name' => 'create subjects', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit subjects', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete subjects', 'guard_name' => 'web']);

        Permission::firstOrCreate(['name' => 'create courses', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit courses', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete courses', 'guard_name' => 'web']);

        Permission::firstOrCreate(['name' => 'create exams', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit exams', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete exams', 'guard_name' => 'web']);

        // Create roles and assign permissions(// Admin role)
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions(Permission::all());
        // Teacher role
        $teacher = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        $teacher->syncPermissions([
            'create subjects',
            'edit subjects',
            'delete subjects',
            'create courses',
            'edit courses',
            'delete courses',
        ]);
        // Student role
        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        // Students have no create/edit/delete permission
    }
}
