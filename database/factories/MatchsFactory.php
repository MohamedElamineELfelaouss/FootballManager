<?php

namespace Database\Factories;

use App\Models\Competitions;
use App\Models\Equipes;
use App\Models\Matchs;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchsFactory extends Factory
{
    protected $model = Matchs::class;

    public function definition()
    {
        return [
            'idCompetition' => function () {
                return Competitions::inRandomOrder()->first()->id ?? Competitions::factory()->create()->id;
            },
            'idEquipeDomicile' => function () {
                return Equipes::inRandomOrder()->first()->id ?? Equipes::factory()->create()->id;
            },
            'idEquipeExterieur' => function (array $attributes) {
                $homeId = $attributes['idEquipeDomicile'];
                // Ensure home and away teams are different
                do {
                    $awayId = Equipes::inRandomOrder()->first()->id ?? Equipes::factory()->create()->id;
                } while ($awayId == $homeId);
                return $awayId;
            },
            'dateMatch' => $this->faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d'),
            'scoreDomicile' => $this->faker->numberBetween(0, 5),
            'scoreExterieur' => $this->faker->numberBetween(0, 5),
        ];
    }
}
