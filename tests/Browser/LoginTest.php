<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function a_user_can_click_the_login_page_starting_from_home_page() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel')
                    ->assertSee('Laracasts')
                    ->clickLink('Log in')
                    ->waitUntilMissing('#authentication-links')
                    ->assertSee('Email')
                    ->assertSee('Password');
                    
        });
    }

    /** @test */
    public function a_user_can_view_the_login_page() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email')
                    ->assertSee('Password')
                    ->assertSee('Remember me')
                    ->assertSee('Forgot your password?')
                    ->assertSee('LOG IN');
        });
    }
}
