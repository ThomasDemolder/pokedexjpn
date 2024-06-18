@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Types</h1>

    <a href="{{ route('types.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 mb-4 inline-block" dusk="add-new-type-button">Ajouter un nouveau type</a>

    @if (session('success'))
        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4" dusk="type-list">
        @foreach ($types as $type)
            <div class="bg-white shadow-md rounded p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->nom }}" class="w-12 h-12 object-cover rounded mr-4">
                    <div>
                        <h5 class="text-lg font-bold">{{ $type->nom }}</h5>
                        <p class="text-gray-600">Couleur : {{ $type->couleur }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('types.edit', $type->id) }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-700 mr-2" dusk="edit-button-{{ $type->id }}">Modifier</a>
                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce type ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" dusk="delete-button-{{ $type->id }}">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
