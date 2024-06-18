<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'nom', 
        'type1_id', 
        'type2_id', 
        'vie', 
        'taille', 
        'poids', 
        'description', 
        'legendaire', 
        'evolution_id', 
        'prevolution_id',
        'generation_id',
        'image'
    ];

    public function type1()
    {
        return $this->belongsTo(Type::class, 'type1_id');
    }

    public function type2()
    {
        return $this->belongsTo(Type::class, 'type2_id');
    }

    public function evolution()
    {
        return $this->belongsTo(Pokemon::class, 'evolution_id');
    }

    public function prevolution()
    {
        return $this->belongsTo(Pokemon::class, 'prevolution_id');
    }
    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }

    public function attaques()
    {
        return $this->belongsToMany(Attaque::class, 'attaque_pokemon');
    }

}
