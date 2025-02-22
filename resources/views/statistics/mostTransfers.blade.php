@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Joueur avec le plus de transferts</h1>
        @if($joueur)
            <p class="mb-2">
                Le joueur <span class="font-bold">{{ $joueur->nom }} {{ $joueur->prenom }}</span> a effectué
                <span class="font-bold">{{ $result->total }}</span> transferts.
            </p>
        @else
            <p class="mb-2">Aucun transfert trouvé.</p>
        @endif
    </div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold"> Transferts List </h1>
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">To</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($transfers as $transfer)
                <tr>
                    <td class="px-6 py-4">{{ $transfer->equipesDepart->nom }}</td>
                    <td class="px-6 py-4">{{ $transfer->equipesArrivee->nom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection