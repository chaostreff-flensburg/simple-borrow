<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(401);
    }

    public function test_login(): void
    {
        $this->seed();

        $response = $this->withHeaders([
            'Authorization' => 'Basic '.base64_encode('user@example.com:password'),
        ])->get('/items');

        $response->assertStatus(200);
    }

    public function test_can_see_search(): void
    {
        $this->seed();

        $response = $this->withHeaders([
            'Authorization' => 'Basic '.base64_encode('user@example.com:password'),
        ])->get('/items');

        $response->assertSee('Suche');
    }
}
