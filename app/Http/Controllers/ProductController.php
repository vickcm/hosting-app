<?php

namespace App\Http\Controllers;

use App\Mail\ProductContract;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ProductController extends Controller
{
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

    // este ya no lo usamos!! 

    public function processContractProduct($id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();


        // Obtener el producto por ID
        $product = Product::findOrFail($id);

        // Verificar si el usuario y el producto existen


        if ($user && $product) {
            // Obtener los IDs del usuario y el producto
            $userId = $user->user_id;
            $userEmail = $user->email;

            $productId = $product->product_id;
            $pricePaid = $product->price;
            // Realizar la asociación en la tabla pivot
            $user->products()->attach($productId, ['user_id' => $userId, 'product_id' => $productId, 'price_paid' => $pricePaid, 'created_at' => now()]);

            

            // Redireccionar a la página de confirmación o a otra página de tu elección
            return redirect()->route('profiles.viewProfile')
                ->with('message', '¡Contratación exitosa! Le hemos enviado un mail a su casilla con los pasos a seguir. Gracias por confiar en nosotros.')
                ->with('type', 'success');
        } else {
            // Manejar el caso en el que el usuario o el producto no existan
            return redirect()->route('home')
                ->with('message', 'Error en la contratación')
                ->with('type', 'success');
        }
    }

    public function confirmCancelProduct($id)
    {

        $product = Product::findOrFail($id);
        $user = Auth::user();

        if ($product && $user) {
            return view('products.confirmCancelProduct')
                ->with('product', $product);
        }
        return redirect()->route('home');
    }

    public function processCancelProduct($id)
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

            // Realizar la actualización en la tabla pivot para establecer status en false
            $user->products()->updateExistingPivot($productId, [
                'status' => false, // Cambiar el estado a falso (cancelado)
                'updated_at' => now() // Actualizar la fecha de actualización
            ]);

            return redirect()->route('profiles.viewProfile')
                ->with('message', 'La cancelación del producto se realizó con éxito')
                ->with('type', 'success');

        } else {
            // Manejar el caso en el que el usuario o el producto no existan
            return redirect()->route('home')
                ->with('message', 'Error al cancelar el producto')
                ->with('type', 'error');
        }
    }
}
