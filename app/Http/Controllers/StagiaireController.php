<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    // Afficher la liste des stagiaires
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaires.index', compact('stagiaires'));
    }

    // Formulaire de création d'un stagiaire
    public function create()
    {
        $agents = Agent::all(); // Liste des maîtres de stage (agents)
        return view('stagiaires.create', compact('agents'));
    }

    // Enregistrer un nouveau stagiaire
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email|unique:stagiaires,email',
            'date_de_naissance' => 'required|date',
            'niveau_etude' => 'required',
            'maitre_stage_id' => 'required|exists:agents,id',
        ]);

        Stagiaire::create($request->all());

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire créé avec succès.');
    }

    // Afficher un stagiaire spécifique
    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaires.show', compact('stagiaire'));
    }

    // Formulaire d'édition pour un stagiaire
    public function edit(Stagiaire $stagiaire)
    {
        $agents = Agent::all();
        return view('stagiaires.edit', compact('stagiaire', 'agents'));
    }

    // Mettre à jour les informations d'un stagiaire
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email|unique:stagiaires,email,' . $stagiaire->id,
            'date_de_naissance' => 'required|date',
            'niveau_etude' => 'required',
            'maitre_stage_id' => 'required|exists:agents,id',
        ]);

        $stagiaire->update($request->all());

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire mis à jour avec succès.');
    }

    // Supprimer un stagiaire
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire supprimé avec succès.');
    }
}
