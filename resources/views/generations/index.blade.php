@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Générations</h1>

    <a href="{{ route('generations.create') }}" class="btn btn-primary mb-4">Ajouter une nouvelle génération</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4">
        @foreach ($generations as $generation)
            <div class="bg-white shadow-md rounded p-4 flex items-center justify-between">
                <div>
                    <h5 class="text-lg font-bold">{{ $generation->nom }}</h5>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('generations.edit', $generation->id) }}" class="btn btn-secondary mr-2">Modifier</a>
                    <form action="{{ route('generations.destroy', $generation->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette génération ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
