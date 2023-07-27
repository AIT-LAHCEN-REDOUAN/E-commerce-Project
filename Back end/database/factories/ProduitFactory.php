<?php

namespace Database\Factories;

use App\Models\categorie;
use App\Models\images;
use App\Models\marque;
use App\Models\type;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
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
            'title'=>fake()->title(),
            'prix'=>fake()->numberBetween(20,500),
            'description'=>fake()->text(200),
            'categorie_id'=>categorie::all()->random()->id,
            'type_id'=>categorie::all()->random()->id,
            'marque_id'=>marque::all()->random()->id,
            'quantity_stock'=>fake()->numberBetween(1,20)
        ];
    }
}
