<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoUploadTest extends TestCase
{
    protected $baseUrl = 'http://checkpoint4.app';

    public function testVideoUpload()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $this->click('Upload Video');

        $this->type('Something to watch', 'title')
            ->type('Science', 'category')
            ->type('https://www.youtube.com/watch?v=ssuiqtreiBg', 'url')
            ->type('Some text for the description', 'description')
            ->press('Upload')
            ->see('The video has been successfully uploaded.');
    }
}
