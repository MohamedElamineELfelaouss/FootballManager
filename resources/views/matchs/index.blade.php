@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Matchs</h1>
            <a href="{{ route('matchs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ajouter un match
            </a>
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
    </div>
@endsection