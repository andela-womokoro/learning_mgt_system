<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileUpdateTest extends TestCase
{
    public function testProfileUpdate()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $this->click('My Profile');

        $this->type('testuser', 'username')
            ->type('test@domain.com', 'email')
            ->type('Test', 'first_name')
            ->type('User', 'last_name')
            ->press('Save Changes')
            ->see('You have successfully updated your profile.');
    }
}
