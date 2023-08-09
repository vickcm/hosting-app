<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

class ProductPriceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;
    public function test_price_attribute_conversion()
    {
        // Crea un producto manualmente para la prueba
        $product = Product::create([
            'title' => 'Test Product',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'price' => 1000, // 1000 en centavos
        ]);

        // dividir el precio por 100 para convertirlo a flotante 
        $product->price = $product->price / 100;

        // Verifica el valor convertido a flotante
        $this->assertSame(10.00, $product->price);

        $product->price = 1550;
        $product->price = $product->price / 100;

        $this->assertSame(15.50, $product->price);
    }
}