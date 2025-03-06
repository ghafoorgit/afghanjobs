<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employmentTypes = [
            ['name' => 'Full Time'],
            ['name' => 'Part Time'],
        ];

        DB::table('work_durations')->insert($employmentTypes);
    }
}
