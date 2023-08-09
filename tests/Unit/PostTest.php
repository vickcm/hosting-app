<?php
namespace Tests\Unit;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_post_with_valid_data()
    {
        // Crear un post utilizando el constructor y el método save()
        $post = new Post([
            'title' => 'Test Title',
            'content' => 'Test Content',
            'category_id' => 1, // Asegúrate de proporcionar un valor válido aquí
            'author_id' => 1, // Asegúrate de proporcionar un valor válido aquí
        ]);
        $post->save();

        // Obtener el post desde la base de datos
        $createdPost = Post::find($post->id);

        // Verificar si los datos del post coinciden con los valores proporcionados
        $this->assertEquals('Test Title', $createdPost->title);
        $this->assertEquals('Test Content', $createdPost->content);
        $this->assertEquals(1, $createdPost->category_id);
        $this->assertEquals(1, $createdPost->author_id);
    }

    // crear un test para verificar que falle cuando no se ingresa un título
    public function test_fails_to_create_post_without_title()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $post = new Post([
            'content' => 'Test Content',
            'category_id' => 1,
            'author_id' => 1,
        ]);
        $post->save();
    }
    
    // crear un test para verificar que falle cuando no se ingresa un contenido
    public function test_fails_to_create_post_without_content()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $post = new Post([
            'title' => 'Test Title',
            'category_id' => 1,
            'author_id' => 1,
        ]);
        $post->save();
    }

    // crear un test para verificar que falle cuando no se ingresa una categoría
    public function test_fails_to_create_post_without_category()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $post = new Post([
            'title' => 'Test Title',
            'content' => 'Test Content',
            'author_id' => 1,
        ]);
        $post->save();
    }

    // crear un test para verificar que falle cuando no se ingresa un autor
    public function test_fails_to_create_post_without_author()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $post = new Post([
            'title' => 'Test Title',
            'content' => 'Test Content',
            'category_id' => 1,
        ]);
        $post->save();
    }

    // crear un test para verificar el mensaje de error cuando no se pasa el content

    public function test_content_is_required_error_messagge()
    {
        $postData = [
            'title' => 'Test Title',
            'category_id' => 1,
            'author_id' => 1,
            // No se proporciona el campo 'content'
        ];

        $validator = Validator::make($postData, Post::validationRules(), Post::validationMessages());

        $this->assertTrue($validator->fails());
        $this->assertTrue($validator->errors()->has('content'));
        $this->assertEquals('El campo contenido es obligatorio', $validator->errors()->first('content'));
    }

    public function test_post_data_is_fillable()
    {
        $fillable = ['title', 'content', 'image', 'image_description', 'author_id', 'category_id'];

        // Crear un arreglo con datos que solo incluyen las claves del $fillable
        $data = [];
        foreach ($fillable as $key) {
            $data[$key] = 'test value';
        }

        // Crear un nuevo Post usando los datos
        $post = Post::create($data);

        // Verificar que los datos llenados coincidan con los del arreglo $fillable
        $this->assertEquals($data, $post->only($fillable));
    }
}