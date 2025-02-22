<?php

use App\Http\Controllers\competitionsController;
use App\Http\Controllers\equipeController;
use App\Http\Controllers\joueursController;
use App\Http\Controllers\matchsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\transfertsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// joueur
Route::get('search-joueurs', [joueursController::class, 'search'])->name('joueurs.search');
Route::get('filter-joueur-goal', [joueursController::class, 'filterByGoal'])->name('joueurs.filterByGoals');
Route::get('filter-joueur-team/{idEquipe}', [joueursController::class, 'filterByTeam'])->name('joueurs.filterByTeam');
Route::resource('joueurs', joueursController::class);
// equipe
Route::get('equipes/{id}/total-players', [equipeController::class, 'totalPlayers'])->name('equipes.totalPlayersequipes');
Route::get('equipes/{id}/average-score', [equipeController::class, 'averageScore'])->name('equipes.averageScore');
Route::get('equipes/{id}/total-transfers', [equipeController::class, 'totalTransferAmount'])->name('equipes.totalTransferAmount');
Route::get('equipes/{id}/total-matches', [equipeController::class, 'totalMatches'])->name('equipes.totalMatches');
Route::resource('equipes', equipeController::class);
// competitions
Route::resource('competitions', competitionsController::class);
//Matchs
Route::resource('matchs', matchsController::class);
Route::get('matchs/filter-after-date', [matchsController::class, 'filterAfterDate'])->name('matchs.filterAfterDate');
Route::get('matchs/by-competition/{competitionId}', [matchsController::class, 'filterByCompetition'])->name('matchs.filterByCompetition');
Route::get('matchs/team/{teamId}', [matchsController::class, 'filterByEquipe'])->name('matchs.filterByEquipe');
//transferts
Route::resource('transferts', transfertsController::class);
Route::get('transferts/filter-by-period', [transfertsController::class, 'filterByPeriod'])->name('transferts.filterByPeriod');
// Statistiques
Route::get('statistics/player-most-transfers', [StatisticsController::class, 'playerWithMostTransfers'])->name('statistics.playerMostTransfers');




