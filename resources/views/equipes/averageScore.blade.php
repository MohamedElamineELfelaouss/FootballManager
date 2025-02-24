@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-7 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $equipe->nom }}</h1>

        <!-- Competition selection form -->
        <form action="{{ route('equipes.averageScore', $equipe->id) }}" method="GET">
            <div>
                <label for="competition" class="block font-medium">Competition :</label>
                <select name="competitionId" id="competition" class="border rounded w-full p-2"
                    onchange="this.form.submit()" required>
                    <option value="">-- Sélectionner une Competition --</option>
                    @foreach($competitions as $competition)
                        <option value="{{ $competition->id }}" {{ request()->input('competitionId') == $competition->id ? 'selected' : '' }}>
                            {{ $competition->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Display Average Score -->
        <div class="bg-gray-100 p-4 rounded-md shadow-sm mt-4">
            @if(!is_null($averageScore))
                <h1 class="mb-2 text-gray-700">
                    <strong class="text-gray-900">Average Score :</strong> {{ $averageScore }}
                </h1>
            @else
                <h1 class="mb-2 text-gray-700">
                    <strong class="text-gray-900">Average Score :</strong> N/A
                </h1>
            @endif
        </div>
    </div>
@endsection