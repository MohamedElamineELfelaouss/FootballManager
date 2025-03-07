@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Détails du Joueur</h1>
        <p class="mb-2"><strong>Nom :</strong> {{ $joueur->nom }}</p>
        <p class="mb-2"><strong>Prénom :</strong> {{ $joueur->prenom }}</p>
        <p class="mb-2"><strong>Poste :</strong> {{ $joueur->poste }}</p>
        <p class="mb-2"><strong>Nationalité :</strong> {{ $joueur->nationalite }}</p>
        <p class="mb-2"><strong>Buts Marqués :</strong> {{ $joueur->buts_marques }}</p>
        <p class="mb-2"><strong>Équipe :</strong> {{ $joueur->equipes ? $joueur->equipes->nom : 'Aucune' }}</p>

        {{-- @dd($joueur->photo_joueur) --}}

        @if($joueur->photo_joueur)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $joueur->photo_joueur) }}" alt="Photo de {{ $joueur->nom }}" class="w-32 h-32
                        object-cover rounded">
            </div>
        @endif

        <a href="{{ route('joueurs.edit', $joueur->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded
                hover:bg-yellow-600 inline-block mt-4">
            Éditer
        </a>
    </div>
@endsection