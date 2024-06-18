<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;

class Home extends Component
{
    #[Layout('layouts.guest')] 
    public $search = '';
    public $selectedType = '';
    public $pokemons;
    public $selectedPokemon = null;
    public $types;

    public function mount()
    {
        $this->types = \App\Models\Type::all();
        $this->pokemons = Pokemon::all();
    }

    public function applySearch()
    {
        $this->pokemons = Pokemon::where('nom', 'like', '%' . $this->search . '%')->get();
    }

    public function applyFilter()
    {
        if ($this->selectedType) {
            $this->pokemons = Pokemon::whereHas('types', function($query) {
                $query->where('type_id', $this->selectedType);
            })->get();
        } else {
            $this->pokemons = Pokemon::all();
        }
    }

    public function showPokemon($id)
    {
        $pokemon = Pokemon::find($id);

        // Convertir la taille en mètres
        $pokemon->taille = number_format($pokemon->taille / 100, 2);

        // Convertir le poids en kilogrammes
        $pokemon->poids = number_format($pokemon->poids / 1000, 2);

        $this->selectedPokemon = $pokemon;
    }

    public function closePokemonDetail()
    {
        $this->selectedPokemon = null;
    }

    public function render()
    {
        return view('livewire.home');
    }
}

