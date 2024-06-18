<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('id')->get();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'couleur' => 'required|string|size:7',
            'image' => 'required|image|max:2048',
        ]);

        $type = new Type;
        $type->nom = $request->nom;
        $type->couleur = $request->couleur;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/types_images');
            $file->move($destinationPath, $filename);
            $type->image = 'types_images/' . $filename;
        }

        $type->save();

        return redirect()->route('types.index')->with('success', 'Type ajouté avec succès.');
    }

    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'couleur' => 'required|string|size:7',
            'image' => 'nullable|image|max:2048',
        ]);

        $type->nom = $request->nom;
        $type->couleur = $request->couleur;

        if ($request->hasFile('image')) {
            if ($type->image && Storage::exists('public/' . $type->image)) {
                Storage::delete('public/' . $type->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/types_images');
            $file->move($destinationPath, $filename);
            $type->image = 'types_images/' . $filename;
        }

        $type->save();

        return redirect()->route('types.index')->with('success', 'Type mis à jour avec succès.');
    }

    public function destroy(Type $type)
    {
        if ($type->image && Storage::exists('public/' . $type->image)) {
            Storage::delete('public/' . $type->image);
        }

        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type supprimé avec succès.');
    }
}
