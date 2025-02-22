@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter une Équipe</h1>
        <form action="{{ route('equipes.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nom" class="block font-medium">Nom :</label>
                <input type="text" name="nom" id="nom" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="pays" class="block font-medium">Pays :</label>
                <input type="text" name="pays" id="pays" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="entraineur" class="block font-medium">Entraineur :</label>
                <input type="text" name="entraineur" id="entraineur" class="border rounded w-full p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection