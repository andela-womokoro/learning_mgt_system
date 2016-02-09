<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    protected $baseUrl = 'http://checkpoint4.app';

    public function testSignIn()
    {
        factory(App\User::class)->create([
            'username' => 'testuser',
            'email' => 'test@domain.com',
            'password' => bcrypt('password'),
        ]);

        $this->visit('/auth/login')
            ->type('test@domain.com', 'email')
            ->type('password', 'password')
            ->check('rememberMe')
            ->press('Sign me in')
            ->seePageIs('/dashboard')
            ->see('Dashboard');
    }
}
