<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('type1_id')->constrained('types');
            $table->foreignId('type2_id')->nullable()->constrained('types');
            $table->integer('vie');
            $table->float('taille');
            $table->float('poids');
            $table->text('description');
            $table->boolean('legendaire');
            $table->foreignId('evolution_id')->nullable()->constrained('pokemons');
            $table->foreignId('prevolution_id')->nullable()->constrained('pokemons');
            $table->foreignId('generation_id')->constrained('generations');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
