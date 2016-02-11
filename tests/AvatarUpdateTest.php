<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AvatarUpdateTest extends TestCase
{
    public function testProfileUpdate()
    {
        $absolutePathToFile = "/images/avatar.png";

        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $this->click('My Profile')->see('My Profile');
    }

    public function testUploadAvatar()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $this->visit('/profile');
        $this->call('POST', '/profile/update/avatar', ['avatar' => ' /images/avatar.png', '_token' => csrf_token() ]);
    }
}
