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
}