<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;

class Home extends Component
{
    #[Layout('layouts.guest')] 
    public $pokemons;
    public $types;
    public $selectedPokemon = null;
    public $search = '';
    public $selectedType = '';

    public function mount()
    {
        $this->types = Type::all();
        $this->pokemons = Pokemon::with(['type1', 'type2'])->get();
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search') {
            $this->applySearch();
        }
    }

    public function applySearch()
    {
        $this->filterPokemons();
    }

    public function applyFilter()
    {
        $this->filterPokemons();
    }

    public function filterPokemons()
    {
        $query = Pokemon::with(['type1', 'type2']);

        if ($this->search) {
            $query->where('nom', 'like', $this->search . '%');
        }

        if ($this->selectedType) {
            $query->where(function ($query) {
                $query->where('type1_id', $this->selectedType)
                      ->orWhere('type2_id', $this->selectedType);
            });
        }

        $this->pokemons = $query->get();
    }

    public function showPokemon($pokemonId)
    {
        $this->selectedPokemon = Pokemon::with(['type1', 'type2', 'evolution', 'prevolution', 'generation', 'attaques'])->find($pokemonId);
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

