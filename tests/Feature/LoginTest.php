<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
    }

    public function test_login()
    {
        $response = $this->post('/login', [
            'email' => 'user1@example.com', 
            'password' => 'password1'
        ]);

        $response->assertRedirect('/cart');
        $this->assertAuthenticated();
    }

    public function test_logout()
    {
        $response = $this->get('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
