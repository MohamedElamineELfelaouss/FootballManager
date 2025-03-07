@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Compétitions</h1>
            <a href="{{ route('competitions.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ajouter une compétition
            </a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Année</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($competitions as $competition)
                        <tr>
                            <td class="px-6 py-4">{{ $competition->nom }}</td>
                            <td class="px-6 py-4">{{ $competition->type }}</td>
                            <td class="px-6 py-4">{{ $competition->annee }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('competitions.show', $competition->id) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('competitions.edit', $competition->id) }}"
                                    class="text-yellow-600 hover:underline">Éditer</a>
                                <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST"
                                    class="inline">
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