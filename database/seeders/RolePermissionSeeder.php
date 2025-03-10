<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
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
        $permissionsAdmin = [
            'add users',
            'create jobs',
            'edit jobs',
            'view jobs',
            'delete jobs',
            'approve jobs',
            'reject jobs',
        ];

        // Create and assign permissions
        foreach ($permissionsAdmin as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());
        $userAdmin = User::firstOrCreate([
            'email' => 'admin@afghanjobs.af'
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Admin@Admin123'), // Hashed password
        ]);

        $userAdmin->assignRole($adminRole);

        $permissionsEmployer = [
            'create jobs',
            'edit jobs',
            'view jobs',
            'delete jobs'
        ];

        $employerRole = Role::firstOrCreate(['name'=>'employer','guard_name'=>'web']);
        $employerRole->givePermissionTo($permissionsEmployer);
        $userEmployer = User::firstOrCreate([
            'email' => 'employer@afghanjobs.af'
        ], [
            'name' => 'Employer',
            'password' => Hash::make('Employer@Admin123'), // Hashed password
        ]);
        $userEmployer->assignRole($employerRole);

    }
}
