<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Edit
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
                    ->assertSee('Test Note')//melihat teks ‘Notes’
                    ->press('@edit-2')//memastikan url setelah menekan tautan sebelumnya
                    ->assertSee('Edit Note')//melihat teks ‘Edit Note’
                    ->type('title', 'Test Note Updated')//mengisi input yang memiliki atribut name title.
                    ->type('description', 'This is a test note updated.')//mengisi input yang memiliki atribut name description.
                    ->press('UPDATE')//menekan tombol ‘Update’
                    ->assertPathIs('/notes');//memastikan url setelah menekan tombol sebelumnya
        });
    }
}
