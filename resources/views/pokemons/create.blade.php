@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Pokémon</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="type1_id" class="block text-gray-700">Type 1 :</label>
            <select name="type1_id" id="type1_id" class="form-input mt-1 block w-full" required>
                <option value="">Choisissez un type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="type2_id" class="block text-gray-700">Type 2 :</label>
            <select name="type2_id" id="type2_id" class="form-input mt-1 block w-full">
                <option value="">Aucun</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="vie" class="block text-gray-700">Vie :</label>
            <input type="number" name="vie" id="vie" value="{{ old('vie') }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="taille" class="block text-gray-700">Taille (cm) :</label>
            <input type="number" name="taille" id="taille" value="{{ old('taille') }}" step="0.1" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="poids" class="block text-gray-700">Poids (g) :</label>
            <input type="number" name="poids" id="poids" value="{{ old('poids') }}" step="0.1" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description :</label>
            <textarea name="description" id="description" class="form-input mt-1 block w-full" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="legendaire" class="block text-gray-700">Légendaire :</label>
            <select name="legendaire" id="legendaire" class="form-input mt-1 block w-full" required>
                <option value="">Choisissez un statut</option>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="evolution_id" class="block text-gray-700">Évolution :</label>
            <select name="evolution_id" id="evolution_id" class="form-input mt-1 block w-full">
                <option value="">Choisissez une évolution</option>
                @foreach ($pokemons as $pokemon)
                    <option value="{{ $pokemon->id }}">{{ $pokemon->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="prevolution_id" class="block text-gray-700">Pré-évolution :</label>
            <select name="prevolution_id" id="prevolution_id" class="form-input mt-1 block w-full">
                <option value="">Choisissez une pré-évolution</option>
                @foreach ($pokemons as $pokemon)
                    <option value="{{ $pokemon->id }}">{{ $pokemon->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="generation_id" class="block text-gray-700">Génération :</label>
            <select name="generation_id" id="generation_id" class="form-input mt-1 block w-full" required>
                <option value="">Choisissez une génération</option>
                @foreach ($generations as $generation)
                    <option value="{{ $generation->id }}">{{ $generation->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image :</label>
            <input type="file" name="image" id="image" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="attaques" class="block text-gray-700">Attaques :</label>
            <div id="attaques-container">
                <select name="attaques[]" class="form-control mb-2" required>
                    <option value="">Choisissez une attaque</option>
                    @foreach($attaques as $attaque)
                        <option value="{{ $attaque->id }}">{{ $attaque->nom }}</option>
                    @endforeach
                </select>

                @for($i = 1; $i < 4; $i++)
                    <select name="attaques[]" class="form-control mb-2">
                        <option value="">Aucune</option>
                        @foreach($attaques as $attaque)
                            <option value="{{ $attaque->id }}">{{ $attaque->nom }}</option>
                        @endforeach
                    </select>
                @endfor
            </div>
        </div>

        <div class="flex items-center">
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">Ajouter</button>
            <a href="{{ route('pokemons.index') }}" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700">Annuler</a>
        </div>
    </form>
</div>
@endsection
