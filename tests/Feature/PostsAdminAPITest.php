<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

use function PHPUnit\Framework\assertJson;

class PostsAdminAPITest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_making_a_get_request_to_the_posts_api_root_returns_all_the_posts(): void
    {
        $response = $this->getJson('/api/posts');

        // las assertions son sobre el response no sobre this. 


        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(4, 'data')
            ->assertJsonStructure(
                [
                    'status',
                    'data' => [
                        '*' => [
                            'id',
                            'category_id',
                            'author_id',
                            'title',
                            'content',
                            'image',
                            'image_description',
                            'created_at',
                            'updated_at',
                        ]
                    ]
                ]


            );
    }

    // traer un post en particular
    public function test_making_a_get_request_to_the_posts_with_id_root_returns_the_requested_post(): void
    {
        $id = 1;
        $response = $this->getJson('/api/posts/' . $id);

        $response
            ->assertStatus(200)

            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.id', $id)
                    ->whereAllType([
                        'status' => 'integer',
                        'data.category_id' => 'integer',
                        'data.author_id' => 'integer',
                        'data.title' => 'string',
                        'data.content' => 'string',
                        'data.image' => 'string|null',
                        'data.image_description' => 'string|null',
                        'data.created_at' => 'string',
                        'data.updated_at' => 'string',
                    ])
            );
    }


// traer un post que no existe por id
    public function test_get_request_to_non_existent_post_by_id_returns_not_found_404(): void
    {
        $nonExistentId = 999; // 
        $response = $this->getJson('/api/posts/' . $nonExistentId);
        $response->assertStatus(404);
            
    }

    // crear un post

    public function test_making_a_post_request_with_valid_data_to_create_a_post_returns_the_created_post(): void
    {
        $data = [
            'category_id' => 1,
            'author_id' => 1,
            'title' => 'Post de prueba',
            'content' => 'Contenido del post de prueba',
           
        ];

        $response = $this->postJson('/api/posts', $data);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    
            );
        $response = $this->getJson('/api/posts/5');

        $response
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->whereAllType([
                        'status' => 'integer',
                        'data.category_id' => 'integer',
                        'data.author_id' => 'integer',
                        'data.title' => 'string',
                        'data.content' => 'string',
                        'data.image' => 'string|null',
                        'data.image_description' => 'string|null',
                        'data.created_at' => 'string',
                        'data.updated_at' => 'string',
                    ])
            );

           
    }
}
