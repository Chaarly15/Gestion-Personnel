<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenoms',
        'date_de_naissance',
        'sexe',
        'emploi',
        'fonction',
        'contact',
        'grade',
        'categorie',
        'date_de_prise_de_service',
    ];

    public function fichePoste()
    {
        return $this->hasMany(FichePoste::class);
    }

    public function registrePresences()
    {
        return $this->hasMany(RegistrePresence::class);
    }

    public function demandesConges()
    {
        return $this->hasMany(DemandeConge::class);
    }
}
