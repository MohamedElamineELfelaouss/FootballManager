<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use App\Models\Equipes;
use App\Models\Matchs;
use App\Models\Joueurs;
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
            'photo_equipe' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($request->hasFile('photo_equipe')) {
            $data['photo_equipe'] = $request->file('photo_equipe')->store('equipes_photos', 'public');
        }
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
            'photo_equipe' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($request->hasFile('photo_equipe')) {
            if ($equipe->photo_joueur) {
                \Storage::disk('public')->delete($equipe->photo_joueur);
            }
            $data['photo_equipe'] = $request->file('photo_equipe')->store('equipes_photos', 'public');
        }

        $equipe->update($data);
        return redirect()->route('equipes.show', $equipe);
    }
    public function show(Equipes $equipe)
    {
        $totalPlayers = Joueurs::where('idEquipe', $equipe->id)->count();
        $listJoueurs = Joueurs::where('idEquipe', $equipe->id)->get();
        $totalMatches = Matchs::where('idEquipeDomicile', $equipe->id)
            ->orWhere('idEquipeExterieur', $equipe->id)
            ->count();
        return view('equipes.show', compact('equipe', 'listJoueurs', 'totalPlayers', 'totalMatches'));
    }

    public function totalTransferAmount($id)
    {
        $equipe = Equipes::findOrFail($id);
        $listTransferts = Transferts::where('idEquipeArrivee', $id)->get();
        $totalAmount = Transferts::where('idEquipeArrivee', $id)->sum('montant');

        return view('equipes.totalTransferts', compact('equipe', 'totalAmount', 'listTransferts'));

    }

    public function averageScore(Request $request, $id)
    {
        $competitionId = $request->query('competitionId');
        $competitions = Competitions::all();
        $equipe = Equipes::findOrFail($id);

        if ($competitionId) {
            $homeScore = $equipe->matchsDomicile()->where('idCompetition', $competitionId)->avg('scoreDomicile');
            $awayScore = $equipe->matchsExterieur()->where('idCompetition', $competitionId)->avg('scoreExterieur');
            $averageScore = (($homeScore ?? 0) + ($awayScore ?? 0)) / 2;
        } else {
            $averageScore = null;
        }
        return view('equipes.averageScore', compact('equipe', 'averageScore', 'competitions'));
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
