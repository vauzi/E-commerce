<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAddressTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_address_index_can_be_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('api/user-address');
        $response->assertStatus(200);
    }
    public function test_user_adderss_create_can_be_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = UserAddress::factory()->create(['user_id'   => $user->id]);
        $response = $this->post('api/user-address', $post->toArray());

        $response->assertStatus(200);
    }
    public function test_user_address_show_can_be_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $show = UserAddress::factory()->create(['user_id' => $user->id]);
        $response = $this->get('api/user-address/' . $show->id);
        $response->assertStatus(200);
    }
    public function test_user_address_update_can_be_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $update = UserAddress::factory()->create(['user_id' => $user->id]);

        $response = $this->put('api/user-address/' . $update->id, $update->toArray());

        $response->assertStatus(200);
    }
    public function test_user_address_destroy_can_be_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $delete = UserAddress::factory()->create(['user_id' => $user->id]);

        $response = $this->delete('api/user-address/' . $delete->id);
        $response->assertStatus(200);
    }
}
