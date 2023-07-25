<?php

namespace Database\Seeders;

use App\Models\cat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class catSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cat::factory()->count(20)->create();
    }
}
