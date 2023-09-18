<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Happiness_chart_table extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('happiness_chart')->insert([
            'department' => 'Sales Team',
            'very_happy' => 16,
            'happy' => 57,
            'content' => 12,
            'unhappy' => 15,
            'very_unhappy' => 0,
            'created_at' => Carbon::now(),
        ]);  

        DB::table('happiness_chart')->insert([
            'department' => 'Workplace',
            'very_happy' => 288,
            'happy' => 491,
            'content' => 99,
            'unhappy' => 101,
            'very_unhappy' => 21,
            'created_at' => Carbon::now(),
        ]);   
    }
}
