<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://checkpoint4.app';

    public function testRegistration()
    {
        $this->visit('/auth/register')
            ->type('testuser', 'username')
            ->type('test@domain.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->type('Test', 'first_name')
            ->type('User', 'last_name')
            ->check('agree')
            ->press('Create my account')
            ->see('Dashboard');
    }
}
