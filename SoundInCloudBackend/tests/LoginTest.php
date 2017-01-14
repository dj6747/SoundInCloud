<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{

    /**
     * Test login page show
     *
     * @return void
     */
    public function testLoginShow()
    {
        $this->visit('/')->seeRouteIs('landing_page');
    }

    /**
     * Test login pass
     *
     * @return void
     */
    public function testLoginPass()
    {
        $user = factory(App\User::class)->make([
            'password' => 'test'
        ]);

        $this->visit('/')
            ->type($user->email, 'email')
            ->type($user->password, 'password')
            ->press('login')
            ->assertResponseStatus(200);
    }
}
