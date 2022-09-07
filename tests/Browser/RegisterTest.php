<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegisterPass()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')->type('email', 'momo@gmail.com')->type('password', '123456789')->type('name', 'mohamed')->type('phone', '456454654')
                ->assertSee('admin/dashboard');
        });
    }
    public function testRegisterFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')->type('email', 'momo@gmail')->type('password', '123456789')->type('name', '')->type('phone', '456454654')
                ->assertSee('admin/dashboard');
        });
    }
}
