<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\Attaque;

class PokemonsTableSeeder extends Seeder
{
    public function run()
    {
        $pokemons = [
            [
                'nom' => 'Aqualin',
                'type1_id' => 4,
                'type2_id' => null,
                'vie' => 50,
                'taille' => 50,
                'poids' => 500,
                'description' => 'Un Pokémon de type eau.',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/aqualin.webp',
                'attaques' => [1]
            ],
            [
                'nom' => 'Aquadojo',
                'type1_id' => 4,
                'type2_id' => 2,
                'vie' => 100,
                'taille' => 150,
                'poids' => 1000,
                'description' => 'Pokemon de type eau',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/aquadojo.webp',
                'attaques' => [2, 3]
            ],
            [
                'nom' => 'Aqualegion',
                'type1_id' => 4,
                'type2_id' => 2,
                'vie' => 200,
                'taille' => 200,
                'poids' => 2500,
                'description' => 'un pokemon de type eau et combat',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/aqualegion.webp',
                'attaques' => [1, 2]
            ],
            [
                'nom' => 'Pyrofix',
                'type1_id' => 7,
                'type2_id' => null,
                'vie' => 50,
                'taille' => 120,
                'poids' => 450,
                'description' => 'Un petit renard de feu',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/pyrofox.webp',
                'attaques' => [3, 14, 13]
            ],
            [
                'nom' => 'Pyroblaze',
                'type1_id' => 7,
                'type2_id' => null,
                'vie' => 150,
                'taille' => 0,
                'poids' => 0,
                'description' => 'Un renard de feu',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/pyroblaze.webp',
                'attaques' => [8, 10]
            ],
            [
                'nom' => 'Pyrostell',
                'type1_id' => 7,
                'type2_id' => 1,
                'vie' => 200,
                'taille' => 180,
                'poids' => 250,
                'description' => 'Un renard de feu et d\'acier',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/pyrosteel.webp',
                'attaques' => [1, 2, 3]
            ],
            [
                'nom' => 'Pigflore',
                'type1_id' => 11,
                'type2_id' => null,
                'vie' => 45,
                'taille' => 80,
                'poids' => 100,
                'description' => 'un cochon de plante',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/pigflore.webp',
                'attaques' => [1,]
            ],
            [
                'nom' => 'Toxicochon',
                'type1_id' => 11,
                'type2_id' => 12,
                'vie' => 120,
                'taille' => 120,
                'poids' => 2000,
                'description' => 'Un cochon toxic',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/toxicochon.webp',
                'attaques' => [5, 20]
            ],
            [
                'nom' => 'Epinochon',
                'type1_id' => 11,
                'type2_id' => 12,
                'vie' => 250,
                'taille' => 200,
                'poids' => 3500,
                'description' => 'un gros cochon de plante et de poison',
                'legendaire' => false,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/epinochon.webp',
                'attaques' => [15, 28, 1]
            ],
            [
                'nom' => 'Hydragon',
                'type1_id' => 4,
                'type2_id' => 7,
                'vie' => 300,
                'taille' => 250,
                'poids' => 5000,
                'description' => 'Un puissant dragon de feu et d\'eau.',
                'legendaire' => true,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 1,
                'image' => 'pokemons_images/hydragon.webp',
                'attaques' => [5, 18, 24, 27]
            ],
            [
                'nom' => 'Kurama',
                'type1_id' => 7,
                'type2_id' => 17,
                'vie' => 500,
                'taille' => 200,
                'poids' => 2000,
                'description' => 'Un renard mi feu mi ténèbre',
                'legendaire' => true,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 2,
                'image' => 'pokemons_images/kurama.webp',
                'attaques' => [5, 30, 25]
            ],
            [
                'nom' => 'Psychokami',
                'type1_id' => 13,
                'type2_id' => 16,
                'vie' => 180,
                'taille' => 150,
                'poids' => 1500,
                'description' => 'Un chat au pouvoirs psychiques',
                'legendaire' => true,
                'evolution_id' => null,
                'prevolution_id' => null,
                'generation_id' => 2,
                'image' => 'pokemons_images/psychokami.webp',
                'attaques' => [9, 40]
            ],
        ];

        foreach ($pokemons as $pokemonData) {
            $attaques = $pokemonData['attaques'];
            unset($pokemonData['attaques']);
            $pokemon = Pokemon::create($pokemonData);
            $pokemon->attaques()->sync($attaques);
        }

        $pokemonUpdates = [
            [
                'nom' => 'aqualin',
                'evolution_id' => 2,
                'prevolution_id' => null,
            ],
            [
                'nom' => 'aquadojo',
                'evolution_id' => 3,
                'prevolution_id' => 1,
            ],
            [
                'nom' => 'aqualegion',
                'evolution_id' => null,
                'prevolution_id' => 2,
            ],
            [
                'nom' => 'Pyrofox',
                'evolution_id' => 5,
                'prevolution_id' => null,
            ],            [
                'nom' => 'Pyroblaze',
                'evolution_id' => 6,
                'prevolution_id' => 4,
            ],            [
                'nom' => 'Pyrosteel',
                'evolution_id' => null,
                'prevolution_id' => 5,
            ],            [
                'nom' => 'Pigflore',
                'evolution_id' => 8,
                'prevolution_id' => null,
            ],            [
                'nom' => 'Toxicochon',
                'evolution_id' => 9,
                'prevolution_id' => 7,
            ],
            [
                'nom' => 'Epinochon',
                'evolution_id' => null,
                'prevolution_id' => 8,
            ],
        ];

        foreach ($pokemonUpdates as $updateData) {
            $pokemon = Pokemon::where('nom', $updateData['nom'])->first();
            if ($pokemon) {
                $pokemon->evolution_id = $updateData['evolution_id'];
                $pokemon->prevolution_id = $updateData['prevolution_id'];
                $pokemon->save();
            }
        }
    }
}
