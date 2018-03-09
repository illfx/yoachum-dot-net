<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/9/18
 * Time: 7:33 AM
 */

namespace Tests\Feature;


use Tests\TestCase;

class CheckLaravelAuthRoutesTest extends TestCase
{

    public function testHomeRoute()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testLoginRoute()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegisterRoute()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);

        $response = $this->post('/register');
        $response->assertStatus(404);
    }

    public function testPasswordRoutes()
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(404);

        $response = $this->post('/password/reset');
        $response->assertStatus(404);

        $response = $this->post('/password/email');
        $response->assertStatus(404);

        $response = $this->get('/password/reset/{token}');
        $response->assertStatus(404);
    }

}