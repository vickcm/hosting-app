<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    //

    public function confirmContractProduct($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        if ($product && $user) {
            return view('products.confirmContractProduct')
                ->with('product', $product);
        }
        return redirect()->route('home');
    }

    public function processContractProduct(Request $request, $id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener el producto por ID
        $product = Product::findOrFail($id);

        // Verificar si el usuario y el producto existen
        if ($user && $product) {
            // Obtener los IDs del usuario y el producto
            $userId = $user->user_id;
            $productId = $product->product_id;

            // Realizar la asociación en la tabla pivot
            $user->products()->attach($productId, ['user_id' => $userId, 'product_id' => $productId, 'created_at'=>now()]);

            // Redireccionar a la página de confirmación o a otra página de tu elección
            return redirect()->route('home')
                ->with('message', '¡Contratación exitosa!')
                ->with('type', 'success');
        } else {
            // Manejar el caso en el que el usuario o el producto no existan
            return redirect()->route('home')
                ->with('message', 'Error en la contratación')
                ->with('type', 'error');
        }
    }
}
