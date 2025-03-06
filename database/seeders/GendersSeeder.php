<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Other'],
        ];

        DB::table('genders')->insert($genders);
    }
}
