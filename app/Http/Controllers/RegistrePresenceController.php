<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\RegistrePresence;
use Illuminate\Http\Request;

class RegistrePresenceController extends Controller
{
     // Afficher le registre de présence
     public function index()
     {
         $presences = RegistrePresence::with('agent')->get();
         return view('presences.index', compact('presences'));
     }
 
     // Formulaire pour ajouter une nouvelle présence
     public function create()
     {
         $agents = Agent::all();
         return view('presences.create', compact('agents'));
     }
 
     // Enregistrer une nouvelle présence
     public function store(Request $request)
     {
         $request->validate([
             'agent_id' => 'required|exists:agents,id',
             'heure_arrivee' => 'required|date_format:H:i',
             'heure_depart' => 'nullable|date_format:H:i',
         ]);
 
         RegistrePresence::create($request->all());
 
         return redirect()->route('presences.index')->with('success', 'Présence enregistrée avec succès.');
     }
 
     // Afficher une présence spécifique
     public function show(RegistrePresence $presence)
     {
         return view('presences.show', compact('presence'));
     }
}
