<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(false);
//        $this->visit('/')
//            ->see('Laravel 5')
//            ->dontSee('Rails');
        $this->json('POST', '/committees', ['name' => 'Sally']);
    }
}
