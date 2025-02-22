<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipes extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'pays', 'entraineur'];
    public function joueurs()
    {
        return $this->hasMany(Joueurs::class);
    }
    public function matchsDomicile()
    {
        return $this->hasMany(Matchs::class, "idEquipeDomicile");
    }
    public function matchsExterieur()
    {
        return $this->hasMany(Matchs::class, "idEquipeExterieur");
    }
}
