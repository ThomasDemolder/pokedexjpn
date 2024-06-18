@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un nouveau type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
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
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="couleur" class="block text-sm font-bold mb-2">Couleur</label>
            <input type="text" name="couleur" id="couleur" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
