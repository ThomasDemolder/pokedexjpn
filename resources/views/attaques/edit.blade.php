@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Modifier l'attaque</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attaques.update', $attaque->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $attaque->nom) }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="degat" class="block text-gray-700">Dégât :</label>
            <input type="number" name="degat" id="degat" value="{{ old('degat', $attaque->degat) }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description :</label>
            <textarea name="description" id="description" class="form-input mt-1 block w-full" required>{{ old('description', $attaque->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="type_id" class="block text-gray-700">Type :</label>
            <select name="type_id" id="type_id" class="form-input mt-1 block w-full" required>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $attaque->type_id ? 'selected' : '' }}>{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <button type="submit" class="btn btn-primary mr-2">Mettre à jour</button>
            <a href="{{ route('attaques.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
