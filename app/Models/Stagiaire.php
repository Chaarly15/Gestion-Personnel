<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenoms',
        'email',
        'date_de_naissance',
        'niveau_etude',
    ];
}
