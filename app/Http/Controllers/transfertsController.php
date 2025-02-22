<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use App\Models\Joueurs;
use App\Models\Transferts;
use Illuminate\Http\Request;

class transfertsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = Transferts::all();
        return view('transferts.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $joueurs = Joueurs::all();
        $equipes = Equipes::all();
        return view('transferts.create', compact('joueurs', 'equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'idJoueur' => 'required|exists:joueurs,id',
            'idEquipeDepart' => 'required|exists:equipes,id',
            'idEquipeArrivee' => 'required|exists:equipes,id',
            'montant' => 'required|numeric',
            'dateTransfert' => 'required|date',
        ]);
        Transferts::create($data);
        return redirect()->route('transferts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transferts $transfert)
    {
        return view('transferts.show', compact('transfert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transferts $transfert)
    {
        $joueurs = Joueurs::all();
        $equipes = Equipes::all();
        return view('transferts.edit', compact('transfert', 'joueurs', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transferts $transfert)
    {
        $data = $request->validate([
            'idJoueur' => 'required|exists:joueurs,id',
            'idEquipeDepart' => 'required|exists:equipes,id',
            'idEquipeArrivee' => 'required|exists:equipes,id',
            'montant' => 'required|numeric',
            'dateTransfert' => 'required|date',
        ]);
        $transfert->update($data);
        return redirect()->route('transferts.index', $transfert->id);

    }

    public function filterByPeriod(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $transferts = Transferts::whereBetween('dateTransfert', [$startDate, $endDate])->get();
        return view('transferts.index', compact('transferts'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transferts $transfert)
    {
        $transfert->delete();
        return redirect()->route('transferts.index');
    }
}
