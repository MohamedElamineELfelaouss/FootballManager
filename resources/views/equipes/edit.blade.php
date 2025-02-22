@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Éditer l'Équipe: {{ $equipe->nom }}</h1>
        <form action="{{ route('equipes.update', $equipe->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nom" class="block font-medium">Nom :</label>
                <input type="text" name="nom" id="nom" value="{{ $equipe->nom }}" class="border rounded w-full p-2"
                    required>
            </div>
            <div>
                <label for="pays" class="block font-medium">Pays :</label>
                <input type="text" name="pays" id="pays" value="{{ $equipe->pays }}" class="border rounded w-full p-2"
                    required>
            </div>
            <div>
                <label for="entraineur" class="block font-medium">Entraineur :</label>
                <input type="text" name="entraineur" id="entraineur" value="{{ $equipe->entraineur }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection