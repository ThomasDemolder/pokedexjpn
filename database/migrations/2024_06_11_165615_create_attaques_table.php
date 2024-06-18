<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttaquesTable extends Migration
{
    public function up()
    {
        Schema::create('attaques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('degat');
            $table->text('description');
            $table->foreignId('type_id')->constrained('types');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attaques');
    }
}
