<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class CheckLinksTest
 * @package Tests\Feature
 */
class CheckLinksTest extends TestCase
{
    /**
     * Check Contact Route
     *
     * @return void
     */

    public function testContactRoute()
    {
        $response = $this->call('GET', '/contact');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Check Home Route
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

}
