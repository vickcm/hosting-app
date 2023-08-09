<?php

namespace Tests\Unit;

use App\Http\Controllers\MercadoPagoController;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductMail;
use Illuminate\Foundation\Testing\RefreshDatabase;



class MercadoPagoControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testProcessSuccess()
    {
        // Crear un usuario manualmente para la prueba
        $user = \App\Models\User::create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),

            // Agrega otros campos que necesites
        ]);
        Auth::login($user);

        // Crear un producto manualmente para la prueba
        $product = Product::create([
            'title' => 'Product Test',
            'subtitle' => 'Product Test Subtitle',
            'description' => 'Product Test Description',
            'price' => 100,
            // Agrega otros campos que necesites
        ]);


        // Simular una solicitud HTTP con los datos necesarios
        $request = new Request([
            'status' => 'success',
            'payment_id' => '123456',
        ]);

        // Crear una instancia del controlador
        $controller = new MercadoPagoController(); // Reemplaza con el nombre de tu controlador

        // Ejecutar el método que queremos probar
        $response = $controller->processSuccess($product->product_id, $request);

        // Verificar que el correo electrónico se haya enviado
       /*  Mail::assertSent(ProductMail::class, function ($mail) use ($user, $product) {
            return $mail->hasTo($user->email) &&
                   $mail->product->product_id === $product->product_id;
        }); */

        // Verificar que la vista 'mp.success' se haya devuelto con los datos correctos
        $this->assertInstanceOf('Illuminate\View\View', $response);
        $this->assertEquals($user->user_id, $response->getData()['user']->user_id);
        $this->assertEquals($product->product_id, $response->getData()['product']->product_id);
    }
}
