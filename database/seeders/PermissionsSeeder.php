<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'post_job' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'edit_job' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'show_job' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'delete_job' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'add_user' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'approve_job' , 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'reject_job' , 'created_at'=>now(), 'updated_at'=>now()],
        ]);
    }
}
