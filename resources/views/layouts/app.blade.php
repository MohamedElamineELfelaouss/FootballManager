<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FootballManager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold tracking-wide">FootballManager</a>
            <div class="space-x-6">
                <a href="{{ route('joueurs.index') }}"
                    class="text-white hover:text-gray-300 transition duration-200">Joueurs</a>
                <a href="{{ route('equipes.index') }}"
                    class="text-white hover:text-gray-300 transition duration-200">Équipes</a>
                <a href="{{ route('competitions.index') }}"
                    class="text-white hover:text-gray-300 transition duration-200">Compétitions</a>
                <a href="{{ route('matchs.index') }}"
                    class="text-white hover:text-gray-300 transition duration-200">Matchs</a>
                <a href="{{ route('transferts.index') }}"
                    class="text-white hover:text-gray-300 transition duration-200">Transferts</a>
                <a href="{{ route('statistics.playerMostTransfers') }}"
                    class="text-white hover:text-gray-300 transition duration-200">
                    Statistiques
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-10 max-w-6xl bg-white p-8 rounded-lg shadow-md">
        @yield('content')
    </div>

</body>

</html>