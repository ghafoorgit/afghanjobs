<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Badakhshan'],
            ['name' => 'Badghis'],
            ['name' => 'Baghlan'],
            ['name' => 'Balkh'],
            ['name' => 'Bamyan'],
            ['name' => 'Daykundi'],
            ['name' => 'Farah'],
            ['name' => 'Faryab'],
            ['name' => 'Ghazni'],
            ['name' => 'Ghor'],
            ['name' => 'Helmand'],
            ['name' => 'Herat'],
            ['name' => 'Jowzjan'],
            ['name' => 'Kabul'],
            ['name' => 'Kandahar'],
            ['name' => 'Kapisa'],
            ['name' => 'Khost'],
            ['name' => 'Kunar'],
            ['name' => 'Kunduz'],
            ['name' => 'Laghman'],
            ['name' => 'Logar'],
            ['name' => 'Nangarhar'],
            ['name' => 'Nimroz'],
            ['name' => 'Nuristan'],
            ['name' => 'Paktia'],
            ['name' => 'Paktika'],
            ['name' => 'Panjshir'],
            ['name' => 'Parwan'],
            ['name' => 'Samangan'],
            ['name' => 'Sar-e Pol'],
            ['name' => 'Takhar'],
            ['name' => 'Urozgan'],
            ['name' => 'Wardak'],
            ['name' => 'Zabul'],
        ];
        DB::table('provinces')->insert($provinces);
    }
}
