<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContractTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contractTypes = [
            ['name' => 'Permanent'],
            ['name' => 'Annual Contract'],
            ['name' => 'Fixed Term'],
            ['name' => 'Intern'],
        ];

        DB::table('contract_types')->insert($contractTypes);
    }
}
