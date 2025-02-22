<?php

namespace Database\Factories;

use App\Models\Equipes;
use App\Models\Joueurs;
use App\Models\Transferts;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransfertsFactory extends Factory
{
    protected $model = Transferts::class;

    public function definition()
    {
        return [
            'idJoueur' => function () {
                return Joueurs::inRandomOrder()->first()->id ?? Joueurs::factory()->create()->id;
            },
            'idEquipeDepart' => function () {
                return Equipes::inRandomOrder()->first()->id ?? Equipes::factory()->create()->id;
            },
            'idEquipeArrivee' => function (array $attributes) {
                $departId = $attributes['idEquipeDepart'];
                // Ensure arriving team is different from departing team
                do {
                    $arriveeId = Equipes::inRandomOrder()->first()->id ?? Equipes::factory()->create()->id;
                } while ($arriveeId == $departId);
                return $arriveeId;
            },
            'montant' => $this->faker->randomFloat(2, 100000, 10000000),
            'dateTransfert' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
        ];
    }
}
