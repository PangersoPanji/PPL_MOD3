<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Note
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')//mengunjungi url halaman utama
                    ->assertSee('Modul 3')//melihat teks ‘Modul 3’
                    ->clickLink('Log in')//menekan tautan ‘Login’
                    ->assertPathIs('/login')//memastikan url setelah menekan tautan sebelumnya
                    ->type('email', 'admin@gmail.com')//mengisi input yang memiliki atribut name email.
                    ->type('password', 'password')//mengisi input yang memiliki atribut name password.
                    ->press('LOG IN')//menekan tombol ‘LOG IN’
                    ->assertPathIs('/dashboard')//memastikan url setelah menekan tombol sebelumnya
                    ->assertSee('Dashboard')//melihat teks ‘Dashboard’
                    ->clickLink('Notes')//menekan tautan ‘Notes’
                    ->assertPathIs('/notes')//memastikan url setelah menekan tautan sebelumnya
                    ->clickLink('Create Note')//menekan tautan ‘Create Note’
                    ->assertPathIs('/create-note')//memastikan url setelah menekan tautan sebelumnya
                    ->assertSee('Create Note')//melihat teks ‘Create Note’
                    ->type('title', 'Test Note')//mengisi input yang memiliki atribut name title.
                    ->type('description', 'This is a test note.')//mengisi input yang memiliki atribut name description.
                    ->press('CREATE')//menekan tombol ‘Create’
                    ->assertPathIs('/notes');//memastikan url setelah menekan tombol sebelumnya
        });
    }
}
