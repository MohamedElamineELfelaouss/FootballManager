<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use App\Models\Equipes;
use App\Models\Matchs;
use Illuminate\Http\Request;

class matchsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matchs = Matchs::all();
        return view('matchs.index', compact('matchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competitions = Competitions::all();
        $equipes = Equipes::all();
        return view('matchs.create', compact('competitions', 'equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'idCompetition' => 'required|exists:competitions,id',
            'idEquipeDomicile' => 'required|exists:equipes,id',
            'idEquipeExterieur' => 'required|exists:equipes,id',
            'dateMatch' => 'required|date',
            'scoreDomicile' => 'required|integer',
            'scoreExterieur' => 'required|integer',
        ]);

        Matchs::create($data);
        return redirect()->route('matchs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matchs $match)
    {
        return view('matchs.show', compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matchs $match)
    {
        $competitions = Competitions::all();
        $equipes = Equipes::all();
        return view('matchs.edit', compact('match', 'competitions', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matchs $match)
    {
        $data = $request->validate([
            'idCompetition' => 'required|exists:competitions,id',
            'idEquipeDomicile' => 'required|exists:equipes,id',
            'idEquipeExterieur' => 'required|exists:equipes,id',
            'dateMatch' => 'required|date',
            'scoreDomicile' => 'required|integer',
            'scoreExterieur' => 'required|integer',
        ]);

        $match->update($data);
        return redirect()->route('matchs.index');
    }

    public function filterByCompetition($idCompetition)
    {
        $matchs = Matchs::where('idCompetition', $idCompetition)->get();
        return view('matchs.index', compact('matchs'));
    }

    public function filterAfterDate(Request $request)
    {
        $date = $request->input('after_date');
        $matchs = Matchs::where('dateMatch', '>', $date)->get();
        return view('matchs.index', compact('matchs'));
    }

    public function filterByEquipe($idEquipe)
    {
        $matchs = Matchs::where('idEquipeDomicile', $idEquipe)
            ->orWhere('idEquipeExterieur', $idEquipe)
            ->get();
        return view('matchs.index', compact('matchs'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $match = Matchs::findOrFail($id);
        $match->delete();
        return redirect()->route('matchs.index');
    }
}
