@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter un Match</h1>
        <form action="{{ route('matchs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="idCompetition" class="block font-medium">Compétition :</label>
                <select name="idCompetition" id="idCompetition" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner une compétition --</option>
                    @foreach($competitions as $competition)
                        <option value="{{ $competition->id }}">{{ $competition->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idEquipeDomicile" class="block font-medium">Équipe Domicile :</label>
                <select name="idEquipeDomicile" id="idEquipeDomicile" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idEquipeExterieur" class="block font-medium">Équipe Extérieur :</label>
                <select name="idEquipeExterieur" id="idEquipeExterieur" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="dateMatch" class="block font-medium">Date du Match :</label>
                <input type="date" name="dateMatch" id="dateMatch" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="scoreDomicile" class="block font-medium">Score Domicile :</label>
                <input type="number" name="scoreDomicile" id="scoreDomicile" class="border rounded w-full p-2">
            </div>
            <div>
                <label for="scoreExterieur" class="block font-medium">Score Extérieur :</label>
                <input type="number" name="scoreExterieur" id="scoreExterieur" class="border rounded w-full p-2">
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection