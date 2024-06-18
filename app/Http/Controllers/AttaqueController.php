<?php

namespace App\Http\Controllers;

use App\Models\Attaque;
use App\Models\Type;
use Illuminate\Http\Request;

class AttaqueController extends Controller
{
    public function index()
    {
        $attaques = Attaque::with('type')->orderBy('id')->get();
        return view('attaques.index', compact('attaques'));
    }

    public function create()
    {
        $types = Type::all();
        return view('attaques.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'degat' => 'required|integer|min:0',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        Attaque::create($request->all());

        return redirect()->route('attaques.index')->with('success', 'Attaque ajoutée avec succès.');
    }

    public function edit(Attaque $attaque)
    {
        $types = Type::all();
        return view('attaques.edit', compact('attaque', 'types'));
    }

    public function update(Request $request, Attaque $attaque)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'degat' => 'required|integer|min:0',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attaque->update($request->all());

        return redirect()->route('attaques.index')->with('success', 'Attaque mise à jour avec succès.');
    }

    public function destroy(Attaque $attaque)
    {
        $attaque->delete();

        return redirect()->route('attaques.index')->with('success', 'Attaque supprimée avec succès.');
    }
}
