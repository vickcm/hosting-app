<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_can_create_post(): void
    {
        $post = new Post([
            'title' => 'Nueva publicación',
            'content' => 'Contenido de la publicación',
        ]);

        $this->assertEquals('Nueva publicación', $post->title);
        $this->assertEquals('Contenido de la publicación', $post->content);

    }
}
