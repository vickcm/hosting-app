<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostAuthorRelationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    public function test_post_belongs_to_author()
    {
        // Crea un autor
        $author = Author::create([
            'author_id' => 1,
            'name' => 'Author Test',
            'email' => 'author@author.com',
            // Otros campos necesarios
        ]);

        // Crea un post y asócialo con el autor
        $post = Post::create([
            'title' => 'Post Test',
            'content' => 'Content of the post',
            'author_id' => $author->author_id,
            'category_id' => 1,
            // Otros campos necesarios
        ]);

        // Verifica la relación entre el post y el autor
        $this->assertInstanceOf(Author::class, $post->author);
        $this->assertEquals($author->author_id, $post->author->author_id);

        // probar obtener el nombre de autor desde el post 
        $this->assertEquals($author->name, $post->author->name);
        // probar obtener el nombre del autor desde el metodo author()
        $this->assertEquals($author->name, $post->author()->first()->name);
        

    }

}
