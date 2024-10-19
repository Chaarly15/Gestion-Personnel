<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\DemandeConge;
use Illuminate\Http\Request;

class DemandeCongeController extends Controller
{
    public function index()
    {
        $demandes = DemandeConge::with('agent')->get();
        return view('demandes.index', compact('demandes'));
    }

    // Formulaire pour créer une demande de congé
    public function create()
    {
        $agents = Agent::all();
        return view('demandes.create', compact('agents'));
    }

    // Enregistrer une nouvelle demande de congé
    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required',
        ]);

        DemandeConge::create($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande de congé enregistrée avec succès.');
    }

    // Afficher une demande de congé spécifique
    public function show(DemandeConge $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    // Formulaire de mise à jour d'une demande de congé
    public function edit(DemandeConge $demande)
    {
        $agents = Agent::all();
        return view('demandes.edit', compact('demande', 'agents'));
    }

    // Mettre à jour une demande de congé
    public function update(Request $request, DemandeConge $demande)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required',
        ]);

        $demande->update($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande de congé mise à jour avec succès.');
    }

    // Supprimer une demande de congé
    public function destroy(DemandeConge $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande de congé supprimée avec succès.');
    }
}
