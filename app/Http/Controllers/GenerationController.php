<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function index()
    {
        $generations = Generation::orderBy('id')->get();
        return view('generations.index', compact('generations'));
    }

    public function create()
    {
        return view('generations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Generation::create($request->all());

        return redirect()->route('generations.index')->with('success', 'Génération ajoutée avec succès.');
    }

    public function edit(Generation $generation)
    {
        return view('generations.edit', compact('generation'));
    }

    public function update(Request $request, Generation $generation)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $generation->update($request->all());

        return redirect()->route('generations.index')->with('success', 'Génération mise à jour avec succès.');
    }

    public function destroy(Generation $generation)
    {
        $generation->delete();

        return redirect()->route('generations.index')->with('success', 'Génération supprimée avec succès.');
    }
}
