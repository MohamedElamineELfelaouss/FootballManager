@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Joueur avec le plus de transferts</h1>

        @if(isset($joueur) && $joueur)
            <p class="mb-2">
                Le joueur <span class="font-bold">{{ $joueur->nom ?? 'Inconnu' }} {{ $joueur->prenom ?? '' }}</span> a effectué
                <span class="font-bold">{{ $result->total ?? 0 }}</span> transferts.
            </p>
        @else
            <p class="mb-2">Aucun transfert trouvé.</p>
        @endif
    </div>
    <div class="mt-5">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold"> Liste des Transferts </h1>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs  uppercase">De</th>
                    <th class="px-6 py-3 text-left text-xs  uppercase">À</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if(isset($transfers) && $transfers->isNotEmpty())
                    @foreach($transfers as $transfer)
                        <tr>
                            <td class="px-6 py-4">{{ $transfer->equipesDepart->nom ?? 'Inconnu' }}</td>
                            <td class="px-6 py-4">{{ $transfer->equipesArrivee->nom ?? 'Inconnu' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center">Aucun transfert enregistré.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection