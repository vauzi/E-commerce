<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_index_can_be_render()
    {
        $response = $this->get('api/product');
        $response->assertStatus(200);
    }
    public function test_product_store_can_be_render()
    {
        $category = ProductCategory::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->post('api/product', $product->toArray());
        $response->assertStatus(200);
    }
}
