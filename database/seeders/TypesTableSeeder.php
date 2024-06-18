<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['nom' => 'Acier', 'couleur' => '#B7B7CE', 'image' => 'types_images/acier.png'],
            ['nom' => 'Combat', 'couleur' => '#C22E28', 'image' => 'types_images/combat.png'],
            ['nom' => 'Dragon', 'couleur' => '#6F35FC', 'image' => 'types_images/dragon.png'],
            ['nom' => 'Eau', 'couleur' => '#6390F0', 'image' => 'types_images/eau.png'],
            ['nom' => 'Électrique', 'couleur' => '#F7D02C', 'image' => 'types_images/electrique.png'],
            ['nom' => 'Fée', 'couleur' => '#D685AD', 'image' => 'types_images/fee.png'],
            ['nom' => 'Feu', 'couleur' => '#EE8130', 'image' => 'types_images/feu.png'],
            ['nom' => 'Glace', 'couleur' => '#96D9D6', 'image' => 'types_images/glace.png'],
            ['nom' => 'Insecte', 'couleur' => '#A6B91A', 'image' => 'types_images/insecte.png'],
            ['nom' => 'Normal', 'couleur' => '#A8A77A', 'image' => 'types_images/normal.png'],
            ['nom' => 'Plante', 'couleur' => '#7AC74C', 'image' => 'types_images/plante.png'],
            ['nom' => 'Poison', 'couleur' => '#A33EA1', 'image' => 'types_images/poison.png'],
            ['nom' => 'Psy', 'couleur' => '#F95587', 'image' => 'types_images/psy.png'],
            ['nom' => 'Roche', 'couleur' => '#B6A136', 'image' => 'types_images/roche.png'],
            ['nom' => 'Sol', 'couleur' => '#E2BF65', 'image' => 'types_images/sol.png'],
            ['nom' => 'Spectre', 'couleur' => '#735797', 'image' => 'types_images/spectre.png'],
            ['nom' => 'Ténèbre', 'couleur' => '#705746', 'image' => 'types_images/tenebre.png'],
            ['nom' => 'Vol', 'couleur' => '#A98FF3', 'image' => 'types_images/vol.png'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
