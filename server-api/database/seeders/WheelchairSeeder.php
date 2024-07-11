<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wheelchair;

class WheelchairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wheelchair::factory()->count(20)->create();
    }
}
