<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\User;

use function PHPUnit\Framework\assertJson;

class PostsAdminAPITest extends TestCase
{

    use RefreshDatabase;
    protected bool $seed = true;

    public function authenticateAsUser(): self
    {
        $user = User::find(2); // 
        if (!$user) {
            throw new \Exception('User not found.');
        }

        return $this->actingAs($user);
    }

    public function authenticateAsAdmin(): self
    {
        $admin = User::find(1); // Assuming admin ID 1 exists
        if (!$admin) {
            throw new \Exception('Admin not found.');
        }

        if ($admin->role !== 'admin') {
            throw new \Exception('User is not an admin.');
        }

        return $this->actingAs($admin);
    }


    public function test_getting_all_posts_returns_list_of_posts(): void
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
    public function test_getting_specific_post_by_id_returns_post_details(): void
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
    public function test_getting_non_existent_post_by_id_returns_404(): void
    {
        $nonExistentId = 999; // 
        $response = $this->getJson('/api/posts/' . $nonExistentId);
        $response->assertStatus(404);
    }

    // crear un post autenticado como admin 

    public function test_creating_post_as_admin_with_valid_data_returns_created_post(): void
    {
        $data = [
            'category_id' => 1,
            'author_id' => 1,
            'title' => 'Post de prueba',
            'content' => 'Contenido del post de prueba',

        ];

        $response = $this->authenticateAsAdmin()->postJson('/api/posts', $data);

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

    // llama un post para creación de un posteo sin estar autenticado 

    public function test_creating_post_without_autentication_returns_401()
    {
        $response = $this->postJson('/api/posts');

        $response->assertStatus(401);
    }

    // llama un post para creación de un posteo sin estar autenticado 

    public function test_authenticated_non_admin_user_cannot_create_post_returns_403()
    {
        $this->authenticateAsUser();

        $response = $this->postJson('/api/posts');
        // 401 si no está autenticado y 403 si tiene el acceso denegado. Está prohibido
        $response->assertStatus(403);
    }

    public function test_admin_can_update_post()
    {

        $data = [
            'category_id' => 1,
            'author_id' => 1,
            'title' => 'Post de prueba',
            'content' => 'Contenido del post de prueba',

        ];

        $response = $this->authenticateAsAdmin()->putJson('/api/posts/1', $data);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)

            );
        $response = $this->getJson('/api/posts/1');

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

    public function test_updating_post_without_autentication_returns_401()
    {
        $response = $this->putJson('/api/posts/1');
        $response->assertStatus(401);
    }

    public function test_authenticated_non_admin_user_cannot_update_a_post_returns_403()
    {
        $this->authenticateAsUser();

        $response = $this->putJson('/api/posts/1');
        // 401 si no está autenticado y 403 si tiene el acceso denegado. Está prohibido
        $response->assertStatus(403);
    }

    public function test_updating_non_existent_post_by_id_returns_404(): void
    {
        $nonExistentId = 999; // 
        $response = $this->authenticateAsAdmin()->putJson('/api/posts/' . $nonExistentId);
        $response->assertStatus(404);
    }

    public function test_admin_can_delete_post()
    {

        $response = $this->authenticateAsAdmin()->deleteJson('/api/posts/1');

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)

            );
        $response = $this->getJson('/api/posts/1');

        $response
            ->assertStatus(404);
    }

    public function test_deleting_post_without_autentication_returns_401()
    {
        $response = $this->deleteJson('/api/posts/1');
        $response->assertStatus(401);
    }

    public function test_authenticated_non_admin_user_cannot_delete_a_post_returns_403()
    {
        $this->authenticateAsUser();

        $response = $this->deleteJson('/api/posts/1');
        $response->assertStatus(403);
    }
}
