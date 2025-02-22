@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter un Joueur</h1>
        <form action="{{ route('joueurs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nom" class="block font-medium">Nom :</label>
                <input type="text" name="nom" id="nom" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="prenom" class="block font-medium">Prénom :</label>
                <input type="text" name="prenom" id="prenom" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="poste" class="block font-medium">Poste :</label>
                <input type="text" name="poste" id="poste" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="nationalite" class="block font-medium">Nationalité :</label>
                <input type="text" name="nationalite" id="nationalite" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="idEquipe" class="block font-medium">Équipe :</label>
                <select name="idEquipe" id="idEquipe" class="border rounded w-full p-2">
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="buts_marques" class="block font-medium">Buts Marqués :</label>
                <input type="number" name="buts_marques" id="buts_marques" value="0" class="border rounded w-full p-2">
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection