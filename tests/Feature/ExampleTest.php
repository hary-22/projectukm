<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_page_redirects_to_login(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302); // redirect ke login (belum auth)
    }
}
