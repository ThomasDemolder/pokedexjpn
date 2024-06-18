<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'couleur', 'image'];

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }

    public function attaques()
    {
        return $this->hasMany(Pokemon::class);
    }

}
