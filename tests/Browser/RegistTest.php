<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')//mengunjungi url halaman utama
                    ->assertSee('Modul 3')//melihat teks ‘Modul 3’
                    ->clickLink('Register')//menekan tautan ‘Register’
                    ->assertPathIs('/register')//memastikan url setelah menekan tautan sebelumnya
                    ->type('name', 'admin')//mengetikkan nama ‘admin’ pada input name
                    ->type('email', 'admin@gmail.com')//mengisi input yang memiliki atribut name email.
                    ->type('password', 'password')//mengisi input yang memiliki atribut name password.
                    ->type('password_confirmation', 'password')//mengisi input yang memiliki atribut name password_confirmation.
                    ->press('REGISTER')//menekan tombol ‘REGISTER’
                    ->assertPathIs('/dashboard');//memastikan url setelah menekan tombol sebelumnya
        });
    }
}
