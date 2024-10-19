<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\FichePoste;
use Illuminate\Http\Request;

class FichePosteController extends Controller
{
   // Afficher la liste des fiches de poste
   public function index()
   {
       $fiches = FichePoste::with('agent')->get(); // Récupère toutes les fiches avec l'agent lié
       return view('fiches.index', compact('fiches')); // Affiche la liste dans une vue
   }

   // Afficher le formulaire de création d'une nouvelle fiche de poste
   public function create()
   {
       $agents = Agent::all(); // Liste des agents
       return view('fiches.create', compact('agents')); // Affiche le formulaire de création
   }

   // Enregistrer une nouvelle fiche de poste dans la base de données
   public function store(Request $request)
   {
       // Validation des données du formulaire
       $request->validate([
           'agent_id' => 'required|exists:agents,id', // Vérifie que l'agent existe
           'fonction' => 'required|string',
           'service' => 'required|string',
           'attributions' => 'required|string',
           'taches' => 'required|string',
       ]);

       // Création de la fiche de poste
       FichePoste::create($request->all());

       // Redirection avec un message de succès
       return redirect()->route('fiches.index')->with('success', 'Fiche de poste créée avec succès.');
   }

   // Afficher les détails d'une fiche de poste spécifique
   public function show(FichePoste $fichePoste)
   {
       return view('fiches.show', compact('fichePoste')); // Affiche les détails de la fiche de poste
   }

   // Afficher le formulaire d'édition pour une fiche de poste
   public function edit(FichePoste $fichePoste)
   {
       $agents = Agent::all(); // Liste des agents
       return view('fiches.edit', compact('fichePoste', 'agents')); // Affiche le formulaire d'édition
   }

   // Mettre à jour les informations d'une fiche de poste dans la base de données
   public function update(Request $request, FichePoste $fichePoste)
   {
       // Validation des données du formulaire
       $request->validate([
           'agent_id' => 'required|exists:agents,id',
           'fonction' => 'required|string',
           'service' => 'required|string',
           'attributions' => 'required|string',
           'taches' => 'required|string',
       ]);

       // Mise à jour de la fiche de poste
       $fichePoste->update($request->all());

       // Redirection avec un message de succès
       return redirect()->route('fiches.index')->with('success', 'Fiche de poste mise à jour avec succès.');
   }

   // Supprimer une fiche de poste
   public function destroy(FichePoste $fichePoste)
   {
       // Suppression de la fiche
       $fichePoste->delete();

       // Redirection avec un message de succès
       return redirect()->route('fiches.index')->with('success', 'Fiche de poste supprimée avec succès.');
   }
}
