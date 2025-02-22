<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use App\Models\Joueurs;
use Illuminate\Http\Request;

class joueursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $joueurs = Joueurs::all();
        return view('joueurs.index', compact('joueurs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipes = Equipes::all();
        return view('joueurs.create', compact('equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'poste' => 'required|string',
            'nationalite' => 'required|string',
            'idEquipe' => 'required|exists:equipes,id',
            'buts_marques' => 'required|integer',
        ]);

        Joueurs::create($data);
        return redirect()->route('joueurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Joueurs $joueur)
    {
        return view('joueurs.show', compact('joueur'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joueurs $joueur)
    {
        $equipes = Equipes::all();
        return view('joueurs.edit', compact('joueur', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joueurs $joueur)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'poste' => 'required|string',
            'nationalite' => 'required|string',
            'idEquipe' => 'required|exists:equipes,id',
            'buts_marques' => 'required|integer',
        ]);

        $joueur->update($data);
        return redirect()->route('joueurs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joueurs $joueur)
    {
        $joueur->delete();
        return redirect()->route('joueurs.index');
    }
    public function search(Request $request)
    {
        $query = Joueurs::query();

        if ($request->filled('nom')) {
            $query->where('nom', 'like', "%{$request->nom}%");
        }
        if ($request->filled('poste')) {
            $query->where('poste', 'like', "%{$request->poste}%");
        }
        if ($request->filled('nationalite')) {
            $query->where('nationalite', 'like', "%{$request->nationalite}%");
        }
        $joueurs = $query->get();
        return view('joueurs.index', compact('joueurs'));
    }
    public function filterByTeam($idEquipe)
    {
        $joueur = Joueurs::where('idEquipe', $idEquipe)->get();
        return view('joueurs.index', compact('joueur'));
    }

    public function filterByGoal(Request $request)
    {
        $minGoalInput = $request->input('min_goals');
        $minGoals = is_numeric($minGoalInput) ? (int) $minGoalInput : 0;

        $joueurs = Joueurs::where('buts_marques', '>=', $minGoals)->orderBy('buts_marques', 'desc')->get();
        return view('joueurs.index', compact('joueurs'));
    }

}
