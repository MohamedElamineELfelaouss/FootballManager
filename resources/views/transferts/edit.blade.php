@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Éditer le Transfert</h1>
        <form action="{{ route('transferts.update', $transfert->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="idJoueur" class="block font-medium">Joueur :</label>
                <select name="idJoueur" id="idJoueur" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner un joueur --</option>
                    @foreach($joueurs as $joueur)
                        <option value="{{ $joueur->id }}" {{ $transfert->idJoueur == $joueur->id ? 'selected' : '' }}>
                            {{ $joueur->nom }} {{ $joueur->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idEquipeDepart" class="block font-medium">Équipe Départ :</label>
                <select name="idEquipeDepart" id="idEquipeDepart" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}" {{ $transfert->idEquipeDepart == $equipe->id ? 'selected' : '' }}>
                            {{ $equipe->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idEquipeArrivee" class="block font-medium">Équipe Arrivée :</label>
                <select name="idEquipeArrivee" id="idEquipeArrivee" class="border rounded w-full p-2" required>
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}" {{ $transfert->idEquipeArrivee == $equipe->id ? 'selected' : '' }}>
                            {{ $equipe->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="montant" class="block font-medium">Montant :</label>
                <input type="number" step="0.01" name="montant" id="montant" value="{{ $transfert->montant }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="dateTransfert" class="block font-medium">Date du Transfert :</label>
                <input type="date" name="dateTransfert" id="dateTransfert" value="{{ $transfert->dateTransfert }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection