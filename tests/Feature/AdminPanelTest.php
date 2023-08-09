<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    public function test_can_see_login(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }
}
