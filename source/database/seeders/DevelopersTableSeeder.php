<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::truncate();

        Developer::create([
            'name' => 'Dev1',
            'competence' => 1,
        ]);
        Developer::create([
            'name' => 'Dev2',
            'competence' => 2,
        ]);
        Developer::create([
            'name' => 'Dev3',
            'competence' => 3,
        ]);
        Developer::create([
            'name' => 'Dev4',
            'competence' => 4,
        ]);
        Developer::create([
            'name' => 'Dev5',
            'competence' => 5,
        ]);
    }
}
