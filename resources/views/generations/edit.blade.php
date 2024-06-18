@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Modifier la génération</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('generations.update', $generation->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $generation->nom) }}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mr-2">Mettre à jour</button>
            <a href="{{ route('generations.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Annuler</a>
        </div>
    </form>
</div>
@endsection
