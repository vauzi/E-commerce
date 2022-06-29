<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAddressTest extends TestCase
{
    use RefreshDatabase;
    /* @tests */
    public function user_address_index_can_be_render()
    {
        $response = $this->get('api/useraddress');

        $response->assertStatus(200);
    }
}
