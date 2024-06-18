@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Liste des Pokémon</h1>

    <a href="{{ route('pokemons.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mb-4 inline-block">Ajouter un nouveau Pokémon</a>

    @if (session('success'))
        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4">
        @foreach ($pokemons as $pokemon)
            <div class="bg-white shadow-md rounded p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->nom }}" class="w-12 h-12 object-cover rounded mr-4">
                    <div>
                        <h5 class="text-lg font-bold">{{ $pokemon->nom }}</h5>
                        <p class="text-gray-600">Type 1 : {{ $pokemon->type1->nom }}</p>
                        <p class="text-gray-600">Type 2 : {{ $pokemon->type2->nom ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('pokemons.show', $pokemon->id) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mr-2">Voir</a>
                    <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-700 mr-2">Modifier</a>
                    <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce Pokémon ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
