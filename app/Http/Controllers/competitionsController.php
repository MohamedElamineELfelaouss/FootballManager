<?php

namespace App\Http\Controllers;


use App\Models\Competitions;
use Illuminate\Http\Request;

class competitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competitions::all();
        return view('competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'type' => 'required|string',
            'annee' => 'required|digits:4',
        ]);

        Competitions::create($data);
        return redirect()->route('competitions.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Competitions $competition)
    {
        return view('competitions.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitions $competition)
    {
        return view('competitions.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitions $competition)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'type' => 'required|string',
            'annee' => 'required|digits:4',
        ]);
        $competition->update($data);
        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitions $competition)
    {
        $competition->delete();
        return redirect()->route('competitions.index');
    }
}
