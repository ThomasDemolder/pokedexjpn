@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Éditer le Pokémon {{ $pokemon->nom }}</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemons.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $pokemon->nom) }}" class="form-input mt-1 block w-full rounded border-gray-300" required>
        </div>

        <div class="mb-4">
            <label for="type1_id" class="block text-gray-700">Type 1 :</label>
            <select name="type1_id" id="type1_id" class="form-select mt-1 block w-full rounded border-gray-300" required>
                <option value="">Choisissez un type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $pokemon->type1_id ? 'selected' : '' }}>{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="type2_id" class="block text-gray-700">Type 2 :</label>
            <select name="type2_id" id="type2_id" class="form-select mt-1 block w-full rounded border-gray-300">
                <option value="">Aucun</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $pokemon->type2_id ? 'selected' : '' }}>{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="vie" class="block text-gray-700">Vie :</label>
            <input type="number" name="vie" id="vie" value="{{ old('vie', $pokemon->vie) }}" class="form-input mt-1 block w-full rounded border-gray-300" required>
        </div>

        <div class="mb-4">
            <label for="taille" class="block text-gray-700">Taille :</label>
            <input type="number" name="taille" id="taille" value="{{ old('taille', $pokemon->taille) }}" class="form-input mt-1 block w-full rounded border-gray-300" required>
        </div>

        <div class="mb-4">
            <label for="poids" class="block text-gray-700">Poids :</label>
            <input type="number" name="poids" id="poids" value="{{ old('poids', $pokemon->poids) }}" class="form-input mt-1 block w-full rounded border-gray-300" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description :</label>
            <textarea name="description" id="description" class="form-textarea mt-1 block w-full rounded border-gray-300" required>{{ old('description', $pokemon->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="legendaire" class="block text-gray-700">Légendaire :</label>
            <select name="legendaire" id="legendaire" class="form-select mt-1 block w-full rounded border-gray-300" required>
                <option value="1" {{ $pokemon->legendaire ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$pokemon->legendaire ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="evolution_id" class="block text-gray-700">Évolution :</label>
            <select name="evolution_id" id="evolution_id" class="form-select mt-1 block w-full rounded border-gray-300">
                <option value="">Aucune</option>
                @foreach($pokemons as $poke)
                    <option value="{{ $poke->id }}" {{ $poke->id == $pokemon->evolution_id ? 'selected' : '' }}>{{ $poke->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="prevolution_id" class="block text-gray-700">Pré-Évolution :</label>
            <select name="prevolution_id" id="prevolution_id" class="form-select mt-1 block w-full rounded border-gray-300">
                <option value="">Aucune</option>
                @foreach($pokemons as $poke)
                    <option value="{{ $poke->id }}" {{ $poke->id == $pokemon->prevolution_id ? 'selected' : '' }}>{{ $poke->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="generation_id" class="block text-gray-700">Génération :</label>
            <select name="generation_id" id="generation_id" class="form-select mt-1 block w-full rounded border-gray-300" required>
                @foreach ($generations as $generation)
                    <option value="{{ $generation->id }}" {{ $generation->id == $pokemon->generation_id ? 'selected' : '' }}>{{ $generation->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image :</label>
            <input type="file" name="image" id="image" class="form-input mt-1 block w-full rounded border-gray-300">
            @if ($pokemon->image)
                <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->nom }}" class="w-24 h-24 mt-2 rounded">
            @endif
        </div>

        <div class="mb-4">
            <label for="attaques" class="block text-gray-700">Attaques :</label>
            <div id="attaques-container">
                <select name="attaques[]" class="form-select mb-2 block w-full rounded border-gray-300" required>
                    <option value="">Choisissez une attaque</option>
                    @foreach($attaques as $atk)
                        <option value="{{ $atk->id }}" {{ in_array($atk->id, $pokemon->attaques->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $atk->nom }}</option>
                    @endforeach
                </select>

                @for($i = 1; $i < 4; $i++)
                    <select name="attaques[]" class="form-select mb-2 block w-full rounded border-gray-300">
                        <option value="">Choisissez une attaque</option>
                        @foreach($attaques as $atk)
                            <option value="{{ $atk->id }}" {{ in_array($atk->id, $pokemon->attaques->pluck('id')->toArray()) && $i < count($pokemon->attaques) ? 'selected' : '' }}>{{ $atk->nom }}</option>
                        @endforeach
                    </select>
                @endfor
            </div>
        </div>

        <div class="flex items-center">
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">Mettre à jour</button>
            <a href="{{ route('pokemons.index') }}" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700">Annuler</a>
        </div>
    </form>
</div>
@endsection
