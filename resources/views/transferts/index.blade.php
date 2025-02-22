@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Transferts</h1>
            <a href="{{ route('transferts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ajouter un transfert
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joueur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Départ</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Arrivée</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($transfers as $transfert)
                        <tr>
                            <td class="px-6 py-4">{{ $transfert->joueur->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $transfert->equipesDepart->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $transfert->equipesArrivee->nom ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $transfert->montant }}</td>
                            <td class="px-6 py-4">{{ $transfert->dateTransfert }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('transferts.show', $transfert->id) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('transferts.edit', $transfert->id) }}"
                                    class="text-yellow-600 hover:underline">Éditer</a>
                                <form action="{{ route('transferts.destroy', $transfert->id) }}" method="POST" class="inline">
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