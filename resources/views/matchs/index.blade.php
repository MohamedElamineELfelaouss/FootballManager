@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Matchs</h1>
            <a href="{{ route('matchs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ajouter un match
            </a>
        </div>
        <div class="mb-4">
            <form action="{{ route('matchs.filterAfterDate') }}" method="GET"
                class="flex flex-col  md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                <label for="after_date" class="text-gray-700 font-medium self-center">Start Date:</label>
                <input type="date" name="after_date" id="after_date" class="border rounded p-2 flex-1 w-full md:w-auto">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Filtrer par date
                </button>
            </form>
        </div>
        <div class="mb-4">
            <form action="{{ route('matchs.filterByEquipe') }}" method="GET" class="flex space-x-2">
                <select name="EquipeId" id="EquipeId" class="border rounded p-2 flex-1">
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
        <div class="mb-4">
            <form action="{{ route('matchs.filterByCompetition') }}" method="GET" class="flex space-x-2">
                <select name="competitionId" id="competitionId" class="border rounded p-2 flex-1">
                    <option value="">-- Sélectionner une Competition --</option>
                    @foreach($competitions as $competition)
                        <option value="{{ $competition->id }}">{{ $competition->nom }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Filtrer par Competition
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Compétition</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Domicile</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Extérieur</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($matchs as $match)
                        <tr>
                            <td class="px-6 py-4">{{ $match->dateMatch }}</td>
                            <td class="px-6 py-4">{{ $match->competitions->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $match->equipesDomicile->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $match->equipesExterieur->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('matchs.show', $match->id) }}" class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('matchs.edit', $match->id) }}"
                                    class="text-yellow-600 hover:underline">Éditer</a>
                                <form action="{{ route('matchs.destroy', $match->id) }}" method="POST" class="inline">
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
        </>
@endsection