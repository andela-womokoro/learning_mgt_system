<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewsTest extends TestCase
{
    public function test404Page()
    {
        $response = $this->call('GET', '/blablabla');
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testSignInLinkOnLandingPage()
    {
        $this->visit('/')->see('Sign in')->assertResponseStatus('200');
    }

    public function testRegLinkOnLandingPage()
    {
        $this->visit('/')->see('Register')->assertResponseStatus('200');
    }

}