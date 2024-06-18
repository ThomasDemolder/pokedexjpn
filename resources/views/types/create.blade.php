@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un nouveau type</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block text-sm font-bold mb-2">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="couleur" class="block text-sm font-bold mb-2">Couleur</label>
            <input type="color" name="couleur" id="couleur" class="form-control mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="form-control-file mt-1 block w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Ajouter</button>
    </form>
</div>
@endsection
