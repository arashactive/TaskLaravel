<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Refund>
 */
class RefundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_id' => fake()->randomElement(File::pluck('id')),
            'name' => fake()->name,
            'iban' => fake()->creditCardNumber(),
            'bic' => fake()->creditCardType(),
            'amount' => fake()->numberBetween(1, 5000)
        ];
    }
}
