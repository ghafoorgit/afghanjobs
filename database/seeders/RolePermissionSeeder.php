<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define permission names
        $permissions = [
            'create users',
            'edit users',
            'delete users',
            'view users',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts'
        ];

        // Create and assign permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Define roles and assign permissions
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $user = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Assign all permissions to admin
        $admin->givePermissionTo(Permission::all());

        // Assign specific permissions to editor
        $editor->givePermissionTo([
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts'
        ]);

        // Assign basic permissions to user
        $user->givePermissionTo(['view users']);
    }
}
