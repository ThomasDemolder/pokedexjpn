<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attaque;
use App\Models\Generation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with(['type1', 'type2', 'attaques'])->orderBy('id')->get();
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        $types = Type::all();
        $attaques = Attaque::all();
        $pokemons = Pokemon::all();
        $generations = Generation::all();
        return view('pokemons.create', compact('types', 'attaques', 'pokemons', 'generations'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'type1_id' => 'required|exists:types,id|different:type2_id',
        'type2_id' => 'nullable|exists:types,id|different:type1_id',
        'vie' => 'required|integer|min:0',
        'taille' => 'required|numeric|min:0',
        'poids' => 'required|numeric|min:0',
        'description' => 'required|string',
        'legendaire' => 'required|boolean',
        'evolution_id' => 'nullable|exists:pokemons,id|different:prevolution_id',
        'prevolution_id' => 'nullable|exists:pokemons,id|different:evolution_id',
        'generation_id' => 'required|exists:generations,id',
        'image' => 'required|image|max:2048',
        'attaques' => 'required|array|min:1|max:4',
        'attaques.*' => 'nullable|exists:attaques,id',
    ]);

    $pokemon = new Pokemon;
    $pokemon->nom = $request->nom;
    $pokemon->type1_id = $request->type1_id;
    $pokemon->type2_id = $request->type2_id;
    $pokemon->vie = $request->vie;
    $pokemon->taille = $request->taille;
    $pokemon->poids = $request->poids;
    $pokemon->description = $request->description;
    $pokemon->legendaire = $request->legendaire;
    $pokemon->evolution_id = $request->evolution_id;
    $pokemon->prevolution_id = $request->prevolution_id;
    $pokemon->generation_id = $request->generation_id;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('storage/pokemons_images');
        $file->move($destinationPath, $filename);
        $pokemon->image = 'pokemons_images/' . $filename;
    }

    $pokemon->save();

    $attaques = array_filter($request->attaques, function ($value) {
        return !is_null($value) && $value !== '';
    });

    $pokemon->attaques()->sync($attaques);

    if ($pokemon->evolution_id) {
        $evolution = Pokemon::find($pokemon->evolution_id);
        $evolution->prevolution_id = $pokemon->id;
        $evolution->save();
    }

    if ($pokemon->prevolution_id) {
        $prevolution = Pokemon::find($pokemon->prevolution_id);
        $prevolution->evolution_id = $pokemon->id;
        $prevolution->save();
    }

    return redirect()->route('pokemons.index')->with('success', 'Pokémon ajouté avec succès.');
}

    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        $attaques = Attaque::all();
        $pokemons = Pokemon::all();
        $generations = Generation::all();
        return view('pokemons.edit', compact('pokemon', 'types', 'attaques', 'pokemons', 'generations'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type1_id' => 'required|exists:types,id|different:type2_id',
            'type2_id' => 'nullable|exists:types,id|different:type1_id',
            'vie' => 'required|integer|min:0',
            'taille' => 'required|numeric|min:0',
            'poids' => 'required|numeric|min:0',
            'description' => 'required|string',
            'legendaire' => 'required|boolean',
            'evolution_id' => 'nullable|exists:pokemons,id|different:prevolution_id|different:id',
            'prevolution_id' => 'nullable|exists:pokemons,id|different:evolution_id|different:id',
            'generation_id' => 'required|exists:generations,id',
            'image' => 'nullable|image|max:2048',
            'attaques' => 'required|array|min:1|max:4',
            'attaques.*' => 'nullable|exists:attaques,id',
        ]);
    
        $pokemon->nom = $request->nom;
        $pokemon->type1_id = $request->type1_id;
        $pokemon->type2_id = $request->type2_id;
        $pokemon->vie = $request->vie;
        $pokemon->taille = $request->taille;
        $pokemon->poids = $request->poids;
        $pokemon->description = $request->description;
        $pokemon->legendaire = $request->legendaire;
        $pokemon->evolution_id = $request->evolution_id;
        $pokemon->prevolution_id = $request->prevolution_id;
        $pokemon->generation_id = $request->generation_id;
    
        if ($request->hasFile('image')) {
            if ($pokemon->image && Storage::exists('public/' . $pokemon->image)) {
                Storage::delete('public/' . $pokemon->image);
            }
    
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/pokemons_images');
            $file->move($destinationPath, $filename);
            $pokemon->image = 'pokemons_images/' . $filename;
        }
    
        $pokemon->save();
    
        $attaques = array_filter($request->attaques, function ($value) {
            return !is_null($value) && $value !== '';
        });
    
        $pokemon->attaques()->sync($attaques);

        if ($pokemon->evolution_id) {
            $evolution = Pokemon::find($pokemon->evolution_id);
            $evolution->prevolution_id = $pokemon->id;
            $evolution->save();
        }
    
        if ($pokemon->prevolution_id) {
            $prevolution = Pokemon::find($pokemon->prevolution_id);
            $prevolution->evolution_id = $pokemon->id;
            $prevolution->save();
        }

        if (is_null($request->evolution_id) && $pokemon->evolution_id != $request->evolution_id) {
            $oldEvolution = Pokemon::find($pokemon->evolution_id);
            if ($oldEvolution && $oldEvolution->prevolution_id == $pokemon->id) {
                $oldEvolution->prevolution_id = null;
                $oldEvolution->save();
            }
        }
    
        if (is_null($request->prevolution_id) && $pokemon->prevolution_id != $request->prevolution_id) {
            $oldPrevolution = Pokemon::find($pokemon->prevolution_id);
            if ($oldPrevolution && $oldPrevolution->evolution_id == $pokemon->id) {
                $oldPrevolution->evolution_id = null;
                $oldPrevolution->save();
            }
        }
    
        return redirect()->route('pokemons.index')->with('success', 'Pokémon mis à jour avec succès.');
    }

    public function destroy(Pokemon $pokemon)
    {
        Pokemon::where('evolution_id', $pokemon->id)->update(['evolution_id' => null]);
    
        Pokemon::where('prevolution_id', $pokemon->id)->update(['prevolution_id' => null]);
    
        if ($pokemon->image && Storage::exists('public/' . $pokemon->image)) {
            Storage::delete('public/' . $pokemon->image);
        }
    
        $pokemon->delete();
    
        return redirect()->route('pokemons.index')->with('success', 'Pokémon supprimé avec succès.');
    }
    
}
