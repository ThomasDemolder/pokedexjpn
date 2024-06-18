<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AttaqueController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokemonShowController;
use App\Livewire\Home;

Route::get('/', Home::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('types', TypeController::class);
    Route::resource('attaques', AttaqueController::class);
    Route::resource('generations', GenerationController::class);
    Route::resource('pokemons', PokemonController::class);
    
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';