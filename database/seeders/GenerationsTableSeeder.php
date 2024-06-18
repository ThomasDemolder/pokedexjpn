<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Generation;

class GenerationsTableSeeder extends Seeder
{
    public function run()
    {
        $generations = [
            ['nom' => 'Origine'],
        ];

        foreach ($generations as $generation) {
            Generation::create($generation);
        }
    }
}
