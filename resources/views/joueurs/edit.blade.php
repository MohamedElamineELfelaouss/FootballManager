@extends('layouts.app')


@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Éditer le Joueur: {{ $joueur->nom }} {{ $joueur->prenom }}</h1>
        <form action="{{ route('joueurs.update', $joueur->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nom" class="block font-medium">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ $joueur->nom }}" class="border rounded w-full p-2"
                    required>
            </div>
            <div>
                <label for="prenom" class="block font-medium">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="{{ $joueur->prenom }}" class="border rounded w-full p-2"
                    required>
            </div>
            <div>
                <label for="poste" class="block font-medium">Poste :</label>
                <input type="text" name="poste" id="poste" value="{{ $joueur->poste }}" class="border rounded w-full p-2"
                    required>
            </div>
            <div>
                <label for="nationalite" class="block font-medium">Nationalité :</label>
                <input type="text" name="nationalite" id="nationalite" value="{{ $joueur->nationalite }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="idEquipe" class="block font-medium">Équipe :</label>
                <select name="idEquipe" id="idEquipe" class="border rounded w-full p-2">
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}" {{ $joueur->idEquipe == $equipe->id ? 'selected' : '' }}>
                            {{ $equipe->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="buts_marques" class="block font-medium">Buts Marqués :</label>
                <input type="number" name="buts_marques" id="buts_marques" value="{{ $joueur->buts_marques }}"
                    class="border rounded w-full p-2">
            </div>
            <div>
                <label for="photo_joueur" class="block font-medium">Photo :</label>
                <input type="file" name="photo_joueur" id="photo_joueur" class="border rounded w-full p-2">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection