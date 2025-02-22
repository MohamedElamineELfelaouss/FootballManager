@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Détails du Match</h1>
        <p class="mb-2"><strong>Date :</strong> {{ $match->dateMatch }}</p>
        <p class="mb-2"><strong>Compétition :</strong> {{ $match->competitions->nom ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Domicile :</strong> {{ $match->equipesDomicile->nom ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Extérieur :</strong> {{ $match->equipesExterieur->nom ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Score Domicile :</strong> {{ $match->scoreDomicile }}</p>
        <p class="mb-2"><strong>Score Extérieur :</strong> {{ $match->scoreExterieur }}</p>
        <div class="mt-4">
            <a href="{{ route('matchs.edit', $match->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Éditer
            </a>
            <form action="{{ route('matchs.destroy', $match->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@endsection