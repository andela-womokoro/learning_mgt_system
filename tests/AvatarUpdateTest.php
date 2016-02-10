<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AvatarUpdateTest extends TestCase
{
    public function testProfileUpdate()
    {
        $absolutePathToFile = "/Users/andela/Desktop/My\ Andela/docs/Passport_photo_300x300.JPG";

        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $this->click('My Profile');

        $this->attach($absolutePathToFile, 'avatar_file')
            ->press('Update Avatar')
            ->see('You have successfully updated your avatar.');
    }
}