<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Abdul Ghafoor Talash',
            'email' => 'jobs@afghanjobs.af',
            'password' => Hash::make('Admin@Admin'), // Ensure to use hashed password
        ]);
        $adminRole = Role::where('name', 'super_admin')->first();
        $user1->roles()->attach($adminRole->id);
    }
}
