@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Détails de l'Équipe: {{ $equipe->nom }}</h1>
        <p class="mb-2"><strong>Pays :</strong> {{ $equipe->pays }}</p>
        <p class="mb-2"><strong>Entraineur :</strong> {{ $equipe->entraineur }}</p>
        @isset($totalPlayers)
            <p class="mb-2"><strong>Total des joueurs :</strong> {{ $totalPlayers }}</p>
        @endisset
        @isset($averageScore)
            <p class="mb-2"><strong>Score moyen :</strong> {{ $averageScore }}</p>
        @endisset
        @isset($totalAmount)
            <p class="mb-2"><strong>Montant total des transferts :</strong> {{ $totalAmount }}</p>
        @endisset
        @isset($totalMatches)
            <p class="mb-2"><strong>Total des matchs joués :</strong> {{ $totalMatches }}</p>
        @endisset
        <div class="mt-4">
            <a href="{{ route('equipes.edit', $equipe->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Éditer l'équipe
            </a>
            <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Supprimer l'équipe
                </button>
            </form>
        </div>
    </div>
@endsection