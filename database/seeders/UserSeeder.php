<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create User
        $user1 = User::firstOrCreate([
            'email' => 'jobs@afghanjobs.af'
        ], [
            'name' => 'Abdul Ghafoor Talash',
            'password' => Hash::make('Admin@Admin'), // Hashed password
        ]);

        // Get or Create Role
        $adminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Assign Role to User
        $user1->assignRole($adminRole);
    }
}
