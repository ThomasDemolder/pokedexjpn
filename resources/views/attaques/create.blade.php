@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une attaque</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attaques.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="degat" class="block text-gray-700">Dégât :</label>
            <input type="number" name="degat" id="degat" value="{{ old('degat') }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description :</label>
            <textarea name="description" id="description" class="form-input mt-1 block w-full" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="type_id" class="block text-gray-700">Type :</label>
            <select name="type_id" id="type_id" class="form-input mt-1 block w-full" required>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mr-2">Ajouter</button>
            <a href="{{ route('attaques.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Annuler</a>
        </div>
    </form>
</div>
@endsection
