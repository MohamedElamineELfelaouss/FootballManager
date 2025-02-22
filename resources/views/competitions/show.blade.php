@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Détails de la Compétition</h1>
        <p class="mb-2"><strong>Nom :</strong> {{ $competition->nom }}</p>
        <p class="mb-2"><strong>Type :</strong> {{ $competition->type }}</p>
        <p class="mb-2"><strong>Année :</strong> {{ $competition->annee }}</p>
        <div class="mt-4">
            <a href="{{ route('competitions.edit', $competition->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Éditer
            </a>
            <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@endsection