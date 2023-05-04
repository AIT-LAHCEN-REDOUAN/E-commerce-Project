<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategorieFactory extends Factory
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
            'categorie'=>fake()->randomElement(['PC Portable Gamer','PC Portable Multimédia','Sac Ordinateur Portable','Processeur','Carte Mere','Stockage','Alimentation PC','Refroidissement','Boitier Pc','Carte Graphique','Memoire vivre','Clavier','Souris','Tapis de souris','Accessoires streaming','Manettes','Volant PC','Ecran','Casque','Microphone','Webcam'])
        ];
    }
}


