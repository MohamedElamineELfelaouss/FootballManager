@extends('layouts.app')

@section('content')

    <div class="Bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1>Equipe : {{ $equipe->nom }}</h1>
        <h2> Total Amout Transferts : {{ $totalAmount }} </h2>
    </div>
    @isset($listTransferts)
        <div class="mt-10 max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center">⇄ Liste des Transferts</h1>
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium">Nom Joueur</th>
                            <th class="px-6 py-3 text-left font-medium">Nationalité</th>
                            <th class="px-6 py-3 text-left font-medium">Poste</th>
                            <th class="px-6 py-3 text-left font-medium">Montant</th>
                            <th class="px-6 py-3 text-left font-medium">Buts Marqués</th>
                            <th class="px-6 py-3 text-left font-medium">Date Transfert</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($listTransferts as $transfert)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-6 py-4">{{ $transfert->joueurs->nom }} {{ $transfert->joueurs->prenom }}</td>
                                <td class="px-6 py-4">{{ $transfert->joueurs->nationalite }}</td>
                                <td class="px-6 py-4">{{ $transfert->joueurs->poste }}</td>
                                <td class="px-6 py-4">{{ $transfert->montant }}💲</td>
                                <td class="px-6 py-4 text-center">{{ $transfert->joueurs->buts_marques }}</td>
                                <td class="px-6 py-4">{{ $transfert->dateTransfert }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset

@endsection