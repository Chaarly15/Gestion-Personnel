<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'date_debut',
        'date_fin',
        'statut',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
