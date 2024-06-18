@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">{{ $pokemon->nom }}</h1>

    <div class="flex flex-col md:flex-row mb-6 bg-white rounded-lg shadow-lg p-6">
        <div class="md:w-1/3 mb-6 md:mb-0">
            <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->nom }}" class="w-full h-auto object-cover rounded">
        </div>
        <div class="md:w-2/3 md:pl-8 flex flex-col justify-between">
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Description</h2>
                <p class="text-gray-700">{{ $pokemon->description }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Types</h2>
                <p class="text-gray-700">Type 1: {{ $pokemon->type1->nom }}</p>
                <p class="text-gray-700">Type 2: {{ $pokemon->type2->nom ?? 'Aucun' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Statistiques</h2>
                <p class="text-gray-700">Vie: {{ $pokemon->vie }}</p>
                <p class="text-gray-700">Taille: {{ number_format($pokemon->taille / 100, 2) }} m</p>
                <p class="text-gray-700">Poids: {{ number_format($pokemon->poids / 1000, 2) }} kg</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Statut</h2>
                <p class="text-gray-700">Légendaire: {{ $pokemon->legendaire ? 'Oui' : 'Non' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Évolution</h2>
                <p class="text-gray-700">Évolution: {{ $pokemon->evolution->nom ?? 'Aucune' }}</p>
                <p class="text-gray-700">Pré-évolution: {{ $pokemon->prevolution->nom ?? 'Aucune' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Génération</h2>
                <p class="text-gray-700">{{ $pokemon->generation->nom }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Attaques</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($pokemon->attaques as $attaque)
                        <li>{{ $attaque->nom }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-4">Modifier</a>
        <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce Pokémon ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700">Supprimer</button>
        </form>
    </div>
</div>
@endsection
