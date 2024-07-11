<?php

namespace Database\Factories;

use App\Models\Wheelchair;
use App\Models\Pacient;
use Illuminate\Database\Eloquent\Factories\Factory;

class WheelchairFactory extends Factory
{
    protected $model = Wheelchair::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pacient_id' => Pacient::factory(),
            'reference_number' => $this->faker->unique()->numerify('WC####')
        ];
    }
}
