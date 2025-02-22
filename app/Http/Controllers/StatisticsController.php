<?php

namespace App\Http\Controllers;

use App\Models\joueurs;
use App\Models\Transferts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function playerWithMostTransfers()
    {
        $result = Transferts::select('idJoueur', DB::raw('COUNT(*) as total'))
            ->groupBy('idJoueur')
            ->orderBy('total', 'desc')
            ->first();
        $joueur = $result ? Joueurs::findOrFail($result->idJoueur) : null;
        $transfers = Transferts::where('idJoueur', $joueur->id)->get();
        return view('statistics.mostTransfers', compact('joueur', 'result', 'transfers'));


    }
}