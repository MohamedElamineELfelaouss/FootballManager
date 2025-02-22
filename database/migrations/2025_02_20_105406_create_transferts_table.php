<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transferts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJoueur');
            $table->unsignedBigInteger('idEquipeDepart');
            $table->unsignedBigInteger('idEquipeArrivee');

            // Use decimal instead of integer for monetary values
            $table->decimal('montant', 10, 2);
            $table->date('dateTransfert');  // Corrected column name

            $table->timestamps();

            $table->foreign('idJoueur')->references('id')->on('joueurs')->onDelete('cascade');
            $table->foreign('idEquipeDepart')->references('id')->on('equipes')->onDelete('cascade');
            $table->foreign('idEquipeArrivee')->references('id')->on('equipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferts');
    }
};
