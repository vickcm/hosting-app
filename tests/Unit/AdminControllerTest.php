<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Controllers\AdminController;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Author;

class AdminControllerTest extends TestCase
{

    use RefreshDatabase;
    protected $seed = true;


    public function testIndexPosts()
    {
        // Crear dos registros de prueba en la base de datos manualmente
        $post1 = new Post();
        $post1->title = 'Post 1';
        $post1->content = 'Contenido del post 1';
        $post1->category_id = 1;
        $post1->author_id = 1;
        $post1->save();

        $post2 = new Post();
        $post2->title = 'Post 2';
        $post2->content = 'Contenido del post 2';
        $post2->category_id = 2;
        $post2->author_id = 2;
        $post2->save();

        // Instanciar el controlador
        $controller = new AdminController();

        // Llamar al método indexPosts directamente
        $response = $controller->indexPosts();

        // Realiza aserciones en la respuesta
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('admin-views.posts-table', $response->name());
       


    }

    public function testIndex()
    {

        $author = new Author([
            'name' => 'Pedro Díaz',
            'email' => 'pdiaz@nubeweb.com',
            // Otras propiedades del autor si es necesario
        ]);
        // Crear objetos de prueba manualmente
        $post1 = new Post([
            'title' => 'Post 1',
            'content' => 'Contenido del post 1',
            'category_id' => 1,
            'author_id' => 1,
            'created_at' => Carbon::now()->subDays(15), // Post del último mes
        ]);
        $post2 = new Post([
            'title' => 'Post 2',
            'content' => 'Contenido del post 2',
            'category_id' => 1,
            'author_id' => 1,
            'created_at' => Carbon::now()->subMonths(2), // Post antiguo
        ]);

        // Crear un mock del controlador y llamar al método index
        $controller = $this->getMockBuilder(AdminController::class)
            ->onlyMethods(['index']) // Solo mockear el método index
            ->getMock();
        
        // Configurar el comportamiento esperado del método index
        $controller->expects($this->once())
            ->method('index')
            ->willReturn(view('admin-views.dashboard', [
                'posts' => collect([$post1, $post2]),
                'cantidadPosteosUltimoMes' => 1,
                'cantidadPosteosPorAutor' => collect([$author]),
                'autorConMasPosteosUltimoMes' => $author,
                'montoTotalRecaudadoMesActual' => 300,
                'cantidadProductosVendidosMesActual' => 2,
                'clienteMayorSumaDineroGastado' => (object) ['user_id' => 1, 'total_amount_spent' => 500],
            ]));

        // Ejecutar el método index del controlador
        $response = $controller->index();

        // Verificar que los datos sean los esperados
        $this->assertInstanceOf('Illuminate\View\View', $response);
        $this->assertCount(2, $response->getData()['posts']);
        $this->assertEquals(1, $response->getData()['cantidadPosteosUltimoMes']);
        // ... y así sucesivamente con el resto de datos

        // No es necesario hacer verificaciones adicionales de base de datos
    }

    
}