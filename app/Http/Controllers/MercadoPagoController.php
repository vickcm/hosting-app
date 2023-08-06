<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MercadoPagoController extends Controller
{
    public function contratacionMercadoPago($id)
    {
        // Obtener el producto por ID (aquí utilizamos el $id recibido desde la URL)
        $product = Product::find($id);
        $payment = new \App\PaymentProviders\MercadoPagoPayment;
        $payment
            ->addItem($product)
            ->withBackUrls(
                route('mp.success', [$product]), // Aquí agregamos el ID del producto a la URL de éxito
                route('mp.pending'),
                route('mp.failure')
            )
            ->withAutoReturn()
            ->save();

        return view('mp.contratacion-mp', [
            'product' => $product,
            'payment' => $payment,
        ]);
    }
    public function processSuccess($id)

    // faltaría enviarle el mail - hacer la otra vista - y agregar a la base de datos los datos de pago puede ser en la misma tabla o tal vez en otra
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
            Mail::to($userEmail)->send(new ProductMail($product));

            return view('mp.success', [
                'user' => $user,
                'product' => $product,
            ])
            ->with('message', 'El producto se reservó con éxito, y se envió un correo electrónico a tu casilla de correo.')
            ->with('type', 'success');

           /*  try {
                // Enviar el correo electrónico
                Mail::to($userEmail)->send(new ProductMail($product));
            } catch (\Exception $e) {
                // Manejar el error de envío de correo electrónico
                $errorMessage = $e->getMessage();

                return redirect()->route('home')
                    ->with('message', 'El producto se reservó con éxito, pero hubo un error al enviar el correo electrónico. Por favor, contactate con atención al cliente.')
                    ->with('type', 'warning')
                    ->with('error', $errorMessage);
            }
        } else {
            // ver si no se graba en la base de datos
        } */
    } }

    public function processPending(Request $request)
    {
        // echo "Pending";
        // dd($request);

        return view('mp.pending');
    }
    public function processFailure(Request $request)
    {
        // echo "Failure";
        // dd($request);
        $user = Auth::user();

        return view('mp.failure', [
            'user' => $user
        ]);
    }
}
