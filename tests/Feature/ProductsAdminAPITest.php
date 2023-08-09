<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsAdminAPITest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    protected bool $seed = true;
    public function test_making_a_get_request_to_the_products_api_root_returns_all_the_products(): void
    {
        $response = $this->getJson('/api/products');

        // las assertions son sobre el response no sobre this. 
        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => [
                        'product_id',
                        'title',
                        'subtitle',
                        'description',
                        'price',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }
}