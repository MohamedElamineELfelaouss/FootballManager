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
        $realMadrid = Equipes::create([
            'nom' => 'Real Madrid',
            'pays' => 'Espagne',
            'entraineur' => 'Carlo Ancelotti',
        ]);

        $barca = Equipes::create([
            'nom' => 'FC Barcelona',
            'pays' => 'Espagne',
            'entraineur' => 'Xavi Hernandez',
        ]);

        $bayern = Equipes::create([
            'nom' => 'Bayern Munich',
            'pays' => 'Allemagne',
            'entraineur' => 'Julian Nagelsmann',
        ]);

        Joueurs::create([
            'nom' => 'Courtois',
            'prenom' => 'tubeau',
            'poste' => 'Gardien',
            'nationalite' => 'Belge',
            'idEquipe' => $realMadrid->id,
            'buts_marques' => 0,
        ]);
        Joueurs::create([
            'nom' => 'Ramos',
            'prenom' => 'Sergio',
            'poste' => 'Défenseur',
            'nationalite' => 'Espagnol',
            'idEquipe' => $realMadrid->id,
            'buts_marques' => 20,
        ]);
        Joueurs::create([
            'nom' => 'Messi',
            'prenom' => 'Lionel',
            'poste' => 'Attaquant',
            'nationalite' => 'Argentin',
            'idEquipe' => $barca->id,
            'buts_marques' => 30,
        ]);
        Joueurs::create([
            'nom' => 'Piqué',
            'prenom' => 'Gerard',
            'poste' => 'Défenseur',
            'nationalite' => 'Espagnol',
            'idEquipe' => $barca->id,
            'buts_marques' => 10,
        ]);

        Joueurs::create([
            'nom' => 'Neuer',
            'prenom' => 'Manuel',
            'poste' => 'Gardien',
            'nationalite' => 'Allemand',
            'idEquipe' => $bayern->id,
            'buts_marques' => 0,
        ]);
        Joueurs::create([
            'nom' => 'Lewandowski',
            'prenom' => 'Robert',
            'poste' => 'Attaquant',
            'nationalite' => 'Polonais',
            'idEquipe' => $bayern->id,
            'buts_marques' => 35,
        ]);

    }
}
