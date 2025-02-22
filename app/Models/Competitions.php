<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'annee'];
    public function matchs()
    {
        return $this->hasMany(Matchs::class, 'idCompetition');
    }
}
