<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')->insert([
            'description' => 'Vigilância Patrimonial',
            'value' => 25,
            'status' => 1
       
        ]);
        DB::table('plans')->insert([
            'description' => 'Vigilância eletrônica',
            'value' => 150,
            'status' => 1
       
        ]);
    }
}
