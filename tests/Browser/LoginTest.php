<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_aluno_deveria_nao_logar_com_a_senha_errada()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('/')
                    ->clickLink('ENTRAR')
                    ->waitFor('form')
                    ->type('email', 'aluno@login')
                    ->type('password', 'senha errada')
                    ->click('[type=submit]')
                    ->assertSee('As informações de login não foram encontradas');
        });
    }
    public function test_aluno_deveria_nao_logar_com_o_email_errado()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('/')
                    ->clickLink('ENTRAR')
                    ->waitFor('form')
                    ->type('email', 'a@b')
                    ->type('password', 'ipi2019')
                    ->click('[type=submit]')
                    ->assertSee('As informações de login não foram encontradas');
        });
    }
    public function test_aluno_deveria_logar()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('/')
                    ->clickLink('ENTRAR')
                    ->waitFor('form')
                    ->type('email', 'aluno@login')
                    ->type('password', 'ipi2019')
                    ->click('[type=submit]')
                    ->assertSee('Meus requerimentos')
                    ->click('[id=navbarDropdown]')
                    ->clickLink('Sair')
                    ->assertPathIs('/');
        });
    }
}
