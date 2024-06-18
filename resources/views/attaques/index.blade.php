@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Attaques</h1>

    <a href="{{ route('attaques.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mb-4 inline-block">Ajouter une nouvelle attaque</a>

    @if (session('success'))
        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4">
        @foreach ($attaques as $attaque)
            <div class="bg-white shadow-md rounded p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $attaque->type->image) }}" alt="{{ $attaque->type->nom }}" class="w-12 h-12 object-cover rounded mr-4">
                    <div>
                        <h5 class="text-lg font-bold">{{ $attaque->nom }}</h5>
                        <p class="text-gray-600">Dégât : {{ $attaque->degat }}</p>
                        <p class="text-gray-600">{{ $attaque->description }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('attaques.edit', $attaque->id) }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-700 mr-2">Modifier</a>
                    <form action="{{ route('attaques.destroy', $attaque->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette attaque ?');">
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
