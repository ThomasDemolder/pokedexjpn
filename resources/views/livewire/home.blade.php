<div class="container mx-auto px-4 py-8" style="width: 80%;">
    <div class="border border-black p-4 mb-8 rounded-lg">
        <h1 class="text-4xl font-extrabold text-center text-red-800">Bienvenue sur mon JAPODEX !</h1>
    </div>
    
    <!-- Barre de recherche et filtres -->
    <div class="border border-black p-4 mb-8 rounded-lg">
        <div class="flex justify-between mb-4">
            <div class="flex space-x-4">
                <input type="text" wire:model.debounce.300ms="search" placeholder="Rechercher un Pokémon par nom..." class="border border-gray-300 rounded py-2 px-4 w-full max-w-md">
                <button wire:click="applySearch" class="bg-red-800 text-white py-2 px-4 rounded hover:bg-red-900">Rechercher</button>
            </div>
            <div class="flex space-x-4">
                <select wire:model="selectedType" class="border border-gray-300 rounded py-2 px-4 pr-8">
                    <option value="">Tous les types</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                    @endforeach
                </select>
                <button wire:click="applyFilter" class="bg-red-800 text-white py-2 px-4 rounded hover:bg-red-900">Filtrer</button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($pokemons as $pokemon)
            <div wire:click="showPokemon({{ $pokemon->id }})" class="cursor-pointer bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                <div class="p-6">
                    <div class="flex justify-center mb-4">
                        <div class="relative z-10 mx-auto bg-white text-black py-2 px-4 border border-gray-300 rounded-full w-max text-xl font-bold shadow-sm {{ $pokemon->legendaire ? 'bg-yellow-300' : '' }}">
                            <h2 class="text-center">{{ $pokemon->nom }}</h2>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->nom }}" class="w-48 h-48 object-contain">
                    </div>
                    <div class="flex justify-center space-x-4">
                        <img src="{{ asset('storage/' . $pokemon->type1->image) }}" alt="{{ $pokemon->type1->nom }}" class="w-12 h-12">
                        @if ($pokemon->type2)
                            <img src="{{ asset('storage/' . $pokemon->type2->image) }}" alt="{{ $pokemon->type2->nom }}" class="w-12 h-12">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($selectedPokemon)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 transition-opacity duration-300">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full max-h-screen overflow-y-auto transform transition-transform duration-300 scale-100 relative">
                <!-- Nom et images des types -->
                <div class="flex justify-between mb-4">
                    <div class="relative z-10 bg-white text-black py-2 px-4 border border-gray-300 rounded-full w-max text-xl font-bold shadow-sm {{ $selectedPokemon->legendaire ? 'bg-yellow-300' : '' }}">
                        <h2 class="text-left">{{ $selectedPokemon->nom }}</h2>
                    </div>
                    <div class="flex space-x-4">
                        <img src="{{ asset('storage/' . $selectedPokemon->type1->image) }}" alt="{{ $selectedPokemon->type1->nom }}" class="w-12 h-12">
                        @if ($selectedPokemon->type2)
                            <img src="{{ asset('storage/' . $selectedPokemon->type2->image) }}" alt="{{ $selectedPokemon->type2->nom }}" class="w-12 h-12">
                        @endif
                    </div>
                </div>
                
                <!-- Image du Pokémon -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/' . $selectedPokemon->image) }}" alt="{{ $selectedPokemon->nom }}" class="w-48 h-48 object-contain">
                </div>
                
                <!-- Titre Information -->
                <h3 class="text-2xl font-bold mt-6 text-black">Information</h3>
                
                <!-- Nom des types -->
                <div class="flex justify-center mb-4 space-x-4">
                    <div class="text-white py-1 px-3 rounded-full" style="background-color: {{ $selectedPokemon->type1->couleur }};">
                        <p class="inline">{{ $selectedPokemon->type1->nom }}</p>
                    </div>
                    @if ($selectedPokemon->type2)
                        <div class="text-white py-1 px-3 rounded-full" style="background-color: {{ $selectedPokemon->type2->couleur }};">
                            <p class="inline">{{ $selectedPokemon->type2->nom }}</p>
                        </div>
                    @endif
                </div>

                <!-- Vie et légendaire -->
                <div class="flex justify-between mb-4">
                    <p><strong>Vie :</strong> {{ $selectedPokemon->vie }}</p>
                    <p><strong>Légendaire :</strong> {{ $selectedPokemon->legendaire ? 'Oui' : 'Non' }}</p>
                </div>
                
                <!-- Taille et poids -->
                <div class="flex justify-between mb-4">
                    <p><strong>Taille :</strong> {{ $selectedPokemon->taille }} m</p>
                    <p><strong>Poids :</strong> {{ $selectedPokemon->poids }} kg</p>
                </div>
                
                <!-- Pré-évolution et évolution -->
                <div class="flex justify-between mb-4">
                    @if ($selectedPokemon->prevolution)
                        <p><strong>Pré-évolution :</strong> {{ $selectedPokemon->prevolution->nom }}</p>
                    @endif
                    @if ($selectedPokemon->evolution)
                        <p><strong>Évolution :</strong> {{ $selectedPokemon->evolution->nom }}</p>
                    @endif
                </div>
                
                <!-- Description -->
                <div class="mb-4">
                    <p class="col-span-2"><strong>Description :</strong> {{ $selectedPokemon->description }}</p>
                </div>
                
                <!-- Attaques -->
                <h3 class="text-2xl font-bold mt-6 text-black">Attaques</h3>
                <ul class="list-disc list-inside">
                    @foreach ($selectedPokemon->attaques as $attaque)
                        <li>
                            <strong>{{ $attaque->nom }} - {{ $attaque->degat }} dégâts :</strong>
                            <span>{{ $attaque->description }}</span>
                        </li>
                    @endforeach
                </ul>

                <!-- Bouton de fermeture -->
                <button wire:click="closePokemonDetail" class="mt-6 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded transition-colors duration-300">Fermer</button>
            </div>
        </div>
    @endif
</div>