@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">Détails de l'Équipe: <span
                class="text-blue-600">{{ $equipe->nom }}</span></h1>

        <div class="bg-gray-100 p-4 rounded-md shadow-sm">
            <p class="mb-2 text-gray-700"><strong class="text-gray-900">Pays :</strong> {{ $equipe->pays }}</p>
            <p class="mb-2 text-gray-700"><strong class="text-gray-900">Entraineur :</strong> {{ $equipe->entraineur }}</p>
            @isset($totalPlayers)
                <p class="mb-2 text-gray-700"><strong class="text-gray-900">Total des joueurs :</strong> {{ $totalPlayers }}</p>
            @endisset
            @isset($averageScore)
                <p class="mb-2 text-gray-700"><strong class="text-gray-900">Score moyen :</strong> {{ $averageScore }}</p>
            @endisset
            @isset($totalAmount)
                <p class="mb-2 text-gray-700"><strong class="text-gray-900">Montant total des transferts :</strong>
                    {{ number_format($totalAmount, 2, ',', ' ') }} €</p>
            @endisset
            @isset($totalMatches)
                <p class="mb-2 text-gray-700"><strong class="text-gray-900">Total des matchs joués :</strong>
                    {{ $totalMatches }}</p>
            @endisset
        </div>

        <div class="mt-6 flex justify-center gap-4">
            <a href="{{ route('equipes.edit', $equipe->id) }}"
                class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-200 shadow-md">
                ✏️ Éditer l'équipe
            </a>
            <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST"
                onsubmit="return confirm('Voulez-vous vraiment supprimer cette équipe?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition duration-200 shadow-md">
                    🗑️ Supprimer l'équipe
                </button>
            </form>
        </div>
    </div>

    @isset($listJoueurs)
        <div class="mt-10 max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center">👥 Liste des Joueurs</h1>
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium">Nom Complet</th>
                            <th class="px-6 py-3 text-left font-medium">Poste</th>
                            <th class="px-6 py-3 text-left font-medium">Nationalité</th>
                            <th class="px-6 py-3 text-left font-medium">Buts Marqués</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($listJoueurs as $joueur)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-6 py-4">{{ $joueur->nom }} {{ $joueur->prenom }}</td>
                                <td class="px-6 py-4">{{ $joueur->poste }}</td>
                                <td class="px-6 py-4">{{ $joueur->nationalite }}</td>
                                <td class="px-6 py-4 text-center font-bold">{{ $joueur->buts_marques }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
@endsection