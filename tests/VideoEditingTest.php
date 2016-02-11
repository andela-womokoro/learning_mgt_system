<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoEditingTest extends TestCase
{
    use DatabaseTransactions;

    protected $baseUrl = 'http://checkpoint4.app';

    public function testVideoCategories()
    {
        $this->visit('/videos/testcategory')
            ->see('Testcategory');
    }

    public function testPlayback()
    {
        $this->visit('/playback/999999')
            ->see('error');
    }

    public function testGetEditVideo()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $response = $this->call('GET', '/video/edit/1');
        $this->assertEquals(500, $response->getStatusCode());
    }

    public function testPostEditVideo()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        // $this->visit('/video/edit/{1}')
        //     ->type('Something to watch', 'title')
        //     ->press('Save Changes')
        //     ->see('Your changes have been saved.');

        $response = $this->call('POST', '/video/edit/1');
        $this->assertEquals(500, $response->getStatusCode());
    }

    public function testGetDeleteVideo()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
             ->visit('/dashboard');

        $response = $this->call('POST', '/video/delete/1');
        $this->assertEquals(500, $response->getStatusCode());
    }
}
