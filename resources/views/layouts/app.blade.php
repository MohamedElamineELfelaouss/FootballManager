<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FootballManager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Example: Using Unbounded font -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">
    <style>
        .unbounded-font {
            font-family: "Unbounded", sans-serif;
            font-optical-sizing: auto;
            font-weight: 300;
            font-style: normal;
        }

        body {
            font-family: "Unbounded", sans-serif;
            /* Dark gradient background using Tailwind's gradient utilities via custom CSS */
            background: linear-gradient(to right, #1f2937, #111827, #1f2937);
            /* You can adjust the colors as needed */
        }
    </style>
</head>

<body class="bg-gradient-to-r from-gray-800 via-gray-900 to-gray-800 text-white">
    <!-- Navbar with refined dark color -->
    <nav class="bg-gray-900 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="unbounded-font text-white text-2xl font-bold tracking-wide">
                Football Manager
            </a>
            <div class="space-x-6">
                <a href="{{ route('joueurs.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Joueurs
                </a>
                <a href="{{ route('equipes.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Équipes
                </a>
                <a href="{{ route('competitions.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Compétitions
                </a>
                <a href="{{ route('matchs.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Matchs
                </a>
                <a href="{{ route('transferts.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Transferts
                </a>
                <a href="{{ route('statistics.playerMostTransfers') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200">
                    Statistiques
                </a>
            </div>
        </div>
    </nav>

    <!-- Main content container -->
    <div class="container mx-auto mt-10 max-w-6xl bg-white p-8 rounded-lg shadow-md text-gray-900">
        @yield('content')
    </div>
</body>

</html>