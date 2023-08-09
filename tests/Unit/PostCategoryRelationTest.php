<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Termwind\Components\Dd;

class PostCategoryRelationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    public function testPostBelongsToCategory()
    {
        // Crea una categoría
        $category = Category::create([
            'category_id' => 1,
            'name' => 'Category Test',
        ]);

        // Crea un post y asócialo con la categoría
        $post = Post::create([
            'title' => 'Post Test',
            'content' => 'Content of the post',
            'category_id' => $category->category_id,
            'author_id' => 1,
        ]);

        // Verifica la relación entre el post y la categoría
        $this->assertInstanceOf(Category::class, $post->category);
        $this->assertEquals($category->category_id, $post->category->category_id);

        // probar obtener el nombre de la categoría desde el post
        $this->assertEquals($category->name, $post->category->name);

        // probar obtener el nombre de la categoría desde el metodo category()
        $this->assertEquals($category->name, $post->category()->first()->name);
    }
}