<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::create([
            'name' => 'Data Mining'
        ]);
        Major::create([
            'name' => 'Web Mining'
        ]);
        Major::create([
            'name' => 'Analysis of Algorithms'
        ]);
        Major::create([
            'name' => 'HCI'
        ]);
        Major::create([
            'name' => 'Data Structure'
        ]);
    }
}
