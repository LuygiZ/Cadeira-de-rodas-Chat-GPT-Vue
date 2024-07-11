<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pacient;

class PacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pacient::factory()->count(10)->create();
    }
}
