<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('JAPODEX');
        });
    }
    public function testSearchButtonPresence(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertVisible('button[wire\\:click="applySearch"]')
                    ->assertSee('Rechercher');
        });
    }
    public function testFilterButtonPresence(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertVisible('button[wire\\:click="applyFilter"]')
                    ->assertSee('Filtrer');
        });
    }
    public function testTypeDropdownPresence(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertVisible('select[wire\\:model="selectedType"]');
        });
    }
    public function testSearchBarPresence(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertVisible('input[placeholder="Rechercher un Pokémon par nom..."]');
        });
    }
}
