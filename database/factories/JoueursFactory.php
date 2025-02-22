<?php

namespace Database\Factories;

use App\Models\Joueurs;
use Illuminate\Database\Eloquent\Factories\Factory;

class JoueursFactory extends Factory
{
    protected $model = Joueurs::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'poste' => $this->faker->randomElement(['Attaquant', 'Milieu', 'Défenseur', 'Gardien']),
            'nationalite' => $this->faker->country,
            'idEquipe' => null, // To be set in the seeder
            'buts_marques' => $this->faker->numberBetween(0, 100),
        ];
    }
}
