@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Joueurs</h1>
            <a href="{{ route('joueurs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ajouter un joueur
            </a>
        </div>

        <div class="mb-4">
            <form action="{{ route('joueurs.filterByTeam') }}" method="GET" class="flex space-x-2">
                <select name="team_selected" id="team_selected" class="border rounded p-2 flex-1">
                    <option value="">-- Sélectionner une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Filtrer par équipe
                </button>
            </form>
        </div>
        <!-- Recherche -->
        <div class="mb-4">
            <form action="{{ route('joueurs.search') }}" method="GET" class="flex space-x-2">
                <input type="text" name="nom" placeholder="Nom" class="border rounded p-2 flex-1">
                <input type="text" name="poste" placeholder="Poste" class="border rounded p-2 flex-1">
                <input type="text" name="nationalite" placeholder="Nationalité" class="border rounded p-2 flex-1">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Rechercher
                </button>
            </form>
        </div>

        <!-- Filtrage par buts -->
        <div class="mb-4">
            <form action="{{ route('joueurs.filterByGoals') }}" method="GET" class="flex space-x-2">
                <input type="number" name="min_goals" placeholder="Min Goals" class="border rounded p-2 flex-1">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Filtrer par buts
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Poste</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nationalité</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Buts</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($joueurs as $joueur)
                        <tr>
                            <td class="px-6 py-4">{{ $joueur->nom }}</td>
                            <td class="px-6 py-4">{{ $joueur->prenom }}</td>
                            <td class="px-6 py-4">{{ $joueur->poste }}</td>
                            <td class="px-6 py-4">{{ $joueur->nationalite }}</td>
                            <td class="px-6 py-4">{{ $joueur->buts_marques }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('joueurs.show', $joueur->id) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('joueurs.edit', $joueur->id) }}"
                                    class="text-yellow-600 hover:underline">Éditer</a>
                                <form action="{{ route('joueurs.destroy', $joueur->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection