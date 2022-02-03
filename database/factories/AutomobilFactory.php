<?php

namespace Database\Factories;

use App\Models\AutomobilType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutomobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $decimals = 2;
        $min = 100;
        $max = 250;
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat($decimals,$min,$max),
            'user_id' => User::factory(), 
            'automobilType_id' => AutomobilType::factory(), 
        ];
    }
}
