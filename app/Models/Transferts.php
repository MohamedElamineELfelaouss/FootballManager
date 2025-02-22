<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transferts extends Model
{
    use HasFactory;
    protected $fillable = ['idJoueur', 'idEquipeDepart', 'idEquipeArrivee', 'montant', 'dateTransfert'];

    public function joueurs()
    {
        return $this->belongsTo(Joueurs::class, 'idJoueur');
    }

    public function equipesDepart()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeDepart');
    }

    public function equipesArrivee()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeArrivee');
    }






}
