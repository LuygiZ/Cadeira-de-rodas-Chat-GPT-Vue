<?php

namespace Database\Factories;

use App\Models\Pacient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacientFactory extends Factory
{
    protected $model = Pacient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'user_id' => $this->faker->numberBetween(1, 10) // Adjust the range according to your user table
        ];
    }
}
