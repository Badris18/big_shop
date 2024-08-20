<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FilamentLoginTest extends DuskTestCase
{
    /**
     * Filament Login Test
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')                    
                // Replace with actual email
                ->type('input[id="data.email"]', 'admin@gmail.com')
                // Replace with actual password
                ->type('input[id="data.password"]', 'admin')
                ->press('Sign in');
                // ->assertPathIs('/admin')
                // Replace with actual welcome text
                // ->assertSee('Dashboard');
        });
    }

    /**
     * Filament Logout Test
     *
     * @return void
     */
    // public function testLogout()
    // {
    //     $this->browse(function (Browser $browser) {
            
    //         $browser->waitFor('head > title')
    //                 ->assertSeeIn('head > title', 'Dashboard');
            

    //     });
    // }
}
