<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrePresence extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'date',
        'heure_arrivee',
        'heure_depart',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
