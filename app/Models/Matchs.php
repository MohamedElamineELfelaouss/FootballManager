<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;
    protected $table = 'matchs';
    protected $fillable = ['idCompetition', 'idEquipeDomicile', 'idEquipeExterieur', 'dateMatch', 'scoreDomicile', 'scoreExterieur'];

    public function competitions()
    {
        return $this->belongsTo(Competitions::class, 'idCompetition');
    }

    public function equipesDomicile()
    {
        return $this->belongsTo(Equipes::class, "idEquipeDomicile");
    }
    public function equipesExterieur()
    {
        return $this->belongsTo(Equipes::class, "idEquipeExterieur");
    }

}