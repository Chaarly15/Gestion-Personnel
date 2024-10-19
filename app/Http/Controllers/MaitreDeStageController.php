<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\MaitreDeStage;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class MaitreDeStageController extends Controller
{
   // Afficher la liste des maîtres de stage (agents ayant des stagiaires)
   public function index()
   {
       $agents = Agent::with('stagiaires')->get();
       return view('maitres.index', compact('agents'));
   }

   // Formulaire d'affectation d'un stagiaire à un maître de stage
   public function assignStagiaire(Agent $agent)
   {
       $stagiaires = Stagiaire::whereNull('maitre_stage_id')->get(); // Stagiaires sans maître
       return view('maitres.assign', compact('agent', 'stagiaires'));
   }

   // Enregistrer l'affectation d'un stagiaire à un maître de stage
   public function storeAssign(Request $request, Agent $agent)
   {
       $request->validate([
           'stagiaire_id' => 'required|exists:stagiaires,id',
       ]);

       $stagiaire = Stagiaire::find($request->stagiaire_id);
       $stagiaire->maitre_stage_id = $agent->id;
       $stagiaire->save();

       return redirect()->route('maitres.index')->with('success', 'Stagiaire affecté avec succès.');
   }
}
