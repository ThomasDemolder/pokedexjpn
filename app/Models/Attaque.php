<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attaque extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'degat', 'description', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getTypeImageAttribute()
    {
        return $this->type->image;
    }
}
