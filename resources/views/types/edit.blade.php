@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Modifier le type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $type->nom) }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="couleur" class="block text-gray-700">Couleur :</label>
            <input type="color" name="couleur" id="couleur" value="{{ old('couleur', $type->couleur) }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image :</label>
            <input type="file" name="image" id="image" class="form-input mt-1 block w-full">
            @if ($type->image)
                <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->nom }}" class="w-24 h-24 mt-2">
            @endif
        </div>

        <div class="flex items-center">
            <button type="submit" class="btn btn-primary mr-2">Mettre à jour</button>
            <a href="{{ route('types.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
