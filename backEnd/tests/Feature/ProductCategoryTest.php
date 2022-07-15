<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_category_index_can_be_render()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $this->get('api/category')->assertStatus(200);
    }
    public function test_product_category_store_can_be_render()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $post = ProductCategory::factory()->create();
        $response = $this->post('api/category', $post->toArray());

        $response->assertStatus(200);
    }
    public function test_product_category_show_can_be_render()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        $post = ProductCategory::factory()->create();
        $response = $this->get('api/category/' . $post->id);

        $response->assertStatus(200);
    }
    public function test_product_category_update_can_be_render()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);

        $post = ProductCategory::factory()->create();
        $response = $this->put('api/category/' . $post->id, $post->toArray());

        $response->assertStatus(200);
    }
    public function test_product_category_destroy_can_be_render()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);

        $post = ProductCategory::factory()->create();
        $response = $this->delete('api/category/' . $post->id);

        $response->assertStatus(200);
    }
}
