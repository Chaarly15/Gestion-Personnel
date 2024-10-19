<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichePoste extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'fonction',
        'attributions',
        'taches',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
