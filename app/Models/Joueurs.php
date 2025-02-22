<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueurs extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'poste', 'nationalite', 'idEquipe', 'buts_marques'];
    public function equipes()
    {
        return $this->belongsTo(Equipes::class, 'idEquipe');
    }


    public function transferts()
    {
        return $this->hasMany(Transferts::class, 'idJoueur');
    }

    

}
