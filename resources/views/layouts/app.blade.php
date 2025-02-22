<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FootballManager</title>
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-xl font-bold">FootballManager</a>
            <div class="space-x-4">
                <a href="{{ route('joueurs.index') }}" class="text-white hover:text-gray-200">Joueurs</a>
                <a href="{{ route('equipes.index') }}" class="text-white hover:text-gray-200">Équipes</a>
                <a href="{{ route('competitions.index') }}" class="text-white hover:text-gray-200">Compétitions</a>
                <a href="{{ route('matchs.index') }}" class="text-white hover:text-gray-200">Matchs</a>
                <a href="{{ route('transferts.index') }}" class="text-white hover:text-gray-200">Transferts</a>
                <a href="{{ route('statistics.playerMostTransfers') }}"
                    class="text-white hover:text-gray-200">Statistiques</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>

</html>