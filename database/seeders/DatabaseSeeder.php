<?php

namespace Database\Seeders;

use App\Models\Competitions;
use App\Models\Equipes;
use App\Models\Joueurs;
use App\Models\Matchs;
use App\Models\Transferts;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 teams
        $equipes = Equipes::factory(10)->create();

        // For each team, create 15 players
        $equipes->each(function ($equipe) {
            Joueurs::factory(15)->create([
                'idEquipe' => $equipe->id
            ]);
        });

        // Create 5 competitions
        Competitions::factory(5)->create();

        // Create 30 matches; factories will automatically assign competitions and teams
        Matchs::factory(30)->create();

        // Create 20 transfers
        Transferts::factory(20)->create();
    }
}
