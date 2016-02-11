<?php

use App\User;
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
            'email' => 'test@domain.com',
            'password' => bcrypt('password'),
            'username' => 'testuser',
        ]);

        $this->visit('/auth/login')
            ->type('test@domain.com', 'email')
            ->type('password', 'password')
            ->check('remember')
            ->press('Sign me in')
            ->see('Dashboard');
    }

    public function testSignOut()
    {
        factory(App\User::class)->create([
            'email' => 'test@domain.com',
            'password' => bcrypt('password'),
            'username' => 'testuser',
        ]);

        $this->visit('/auth/logout')
            ->see('email');
    }

    public function testSocialMediaLogin()
    {
        $response = $this->call('GET', '/auth/twitter');
        $this->assertEquals(302, $response->getStatusCode());
    }
}
