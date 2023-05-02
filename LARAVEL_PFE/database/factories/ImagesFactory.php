<?php

namespace Database\Factories;

use App\Models\produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'image'=>fake()->imageUrl(),
            'produit_id'=>produit::all()->random()->id
        ];
    }
}
