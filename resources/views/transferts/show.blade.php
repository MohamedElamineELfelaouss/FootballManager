@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Détails du Transfert</h1>
        <p class="mb-2"><strong>Joueur ID :</strong> {{ $transfert->idJoueur }}</p>
        <p class="mb-2"><strong>Joueur Full name :</strong> {{ $transfert->joueurs->nom }} {{ $transfert->joueurs->prenom }}
        </p>
        <p class="mb-2"><strong>Équipe Départ :</strong> {{ $transfert->equipesDepart->nom }}</p>
        <p class="mb-2"><strong>Équipe Arrivée ID :</strong> {{ $transfert->equipesArrivee->nom }}</p>
        <p class="mb-2"><strong>Montant :</strong> {{ $transfert->montant }}</p>
        <p class="mb-2"><strong>Date du Transfert :</strong> {{ $transfert->dateTransfert }}</p>
        <div class="mt-4">
            <a href="{{ route('transferts.edit', $transfert->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Éditer
            </a>
            <form action="{{ route('transferts.destroy', $transfert->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@endsection