<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttaquePokemonTable extends Migration
{
    public function up()
    {
        Schema::create('attaque_pokemon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id')->constrained('pokemons')->onDelete('cascade');
            $table->foreignId('attaque_id')->constrained('attaques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attaque_pokemon');
    }
}
