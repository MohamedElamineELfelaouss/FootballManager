<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use App\Models\Matchs;
use App\Models\Transferts;
use Illuminate\Http\Request;

class equipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipes = Equipes::all();
        return view('equipes.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'pays' => 'required|string',
            'entraineur' => 'required|string',
        ]);
        Equipes::create($data);
        return redirect()->route('equipes.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipes $equipe)
    {
        return view('equipes.edit', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipes $equipe)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'pays' => 'required|string',
            'entraineur' => 'required|string',
        ]);
        $equipe->update($data);
        return redirect()->route('equipes.index');
    }
    public function show(Equipes $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }

    public function totalPlayers($id)
    {
        $equipe = Equipes::findOrFail($id);
        $totalPlayers = $equipe->joueurs->count();
        return view('equipes.show', compact('equipe', 'totalPlayers'));
    }

    public function averageScore(Request $request, $id)
    {
        $competitionId = $request->input('competitionId');
        $equipe = Equipes::findOrFail($id);

        $homeScore = $equipe->matchsDomicile()->where('idCompetition', $competitionId)->avg('scoreEquipeDomicile');
        $awayScore = $equipe->matchsExterieur()->where('idCompetition', $competitionId)->avg('scoreEquipeExterieur');
        $averageScore = ($homeScore + $awayScore) / 2;
        return view('equipes.show', compact('equipe', 'averageScore'));
    }
    public function totalTransferAmount($id)
    {
        $equipe = Equipes::findOrFail($id);
        $totalAmount = Transferts::where('idEquipeArrivee', $id)->sum('montant');

        return view('equipes.show', compact('equipe', 'totalAmount'));

    }

    public function totalMatches($id)
    {
        $equipe = Equipes::findOrFail($id);
        $totalMatches = Matchs::where('idEquipeDomicile', $id)
            ->orWhere('idEquipeExterieur', $id)
            ->count();
        return view('equipes.show', compact('equipe', 'totalMatches'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipes $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index');
    }
}
