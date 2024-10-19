<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|unique:agents',
            'nom' => 'required',
            'prenoms' => 'required',
            // Autres validations...
        ]);

        Agent::create($request->all());
        return redirect()->route('agents.index');
    }

    public function show(Agent $agent)
    {
        return view('agents.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'matricule' => 'required',
            'nom' => 'required',
            'prenoms' => 'required',
            // Autres validations...
        ]);

        $agent->update($request->all());
        return redirect()->route('agents.index');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index');
    }
}
