@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Bienvenue sur FootballManager</h1>
        <p class="text-lg text-gray-700 mb-8">
            Gérez vos équipes, joueurs, compétitions, matchs et transferts en toute simplicité.
        </p>
        <a href="{{ route('joueurs.index') }}"
            class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200">
            Commencez maintenant
        </a>
    </div>
@endsection