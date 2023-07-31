<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MercadoPagoController extends Controller
{
    // public function show()
    // {
    //     $products = Product::whereIn('product_id', [1,2])->get();

    //     //configuramos el sdk de mp con nuestras credenciales de acceso
    //     \MercadoPago\SDK::setAccessToken(config('mercadopago.accessToken'));

    //     //creamos la preferencia, cobro que vamos a pedirle al usuario
    //     //para crearla, como requisito tenemos que asociarle al menos un item
    //     // los items a cobrar deben ser instancia de la clase \MercadoPago\Item y deben asignarse como un array a la propiedad items de la preferencia
    //     $items = [];
    //     foreach ($products as $product) {
    //         $item = new \MercadoPago\Item();
    //         $item->title = $product->title;
    //         $item->quantity = 1;
    //         $item->unit_price = $product->price;
    //         $items[] = $item;
    //     }

    //     $preference = new \MercadoPago\Preference();
    //     $preference->items = $items;

    //     //registramos en la preferencia cuales son las URLs a las que nos debe retornar cuando el flujo de cobro se complete, dependiendo del resultado del mismo
    //     $preference->back_urls = [
    //         'success' => route('mp.success'),
    //         'pending' => route('mp.pending'),
    //         'failure' => route('mp.failure'),
    //     ];
    //     // tambien le podemos indicar en caso de exito, que redireccione automaticamente luego de 5s
    //     $preference->auto_return = 'approved';

    //     //se genera el id aca para poder usarlo en la vista
    //     $preference->save();

    //     return view('mp.show', [
    //         'products' => $products,
    //         'preference' => $preference,
    //         'publicKey' => config('mercadopago.publicKey'),
    //     ]);
    // }
    public function showV2($id)
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

        return view('mp.show-v2', [
            'product' => $product,
            'payment' => $payment,
        ]);
    }

   /*  public function processSuccess($product, Request $request)
    {
        // aca podriamos guardar los datos de que la compra se realizo correctamente, para habilitar el servicio, marcar como abonado los productos para proceder a su envio, etc
        echo "Succes";
        dd($request);

          

        // obtengo el usuario logueado
        $user = Auth::user();

        if ($user && $product) {
            // Obtener los IDs del usuario y el producto
            $userId = $user->user_id;

            $productId = $product->product_id;
            $pricePaid = $product->price;
            // Realizar la asociación en la tabla pivot
            $user->products()->attach($productId, ['user_id' => $userId, 'product_id' => $productId, 'price_paid' => $pricePaid ,'created_at'=>now()]);
        

       
    } */

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
            $user->products()->attach($productId, ['user_id' => $userId, 'product_id' => $productId, 'price_paid' => $pricePaid ,'created_at'=>now()]);
            
           /*  try {
                // Enviar el correo electrónico
                Mail::to($userEmail)->send(new ProductContract($product));

            } catch (\Exception $e) {
                // Manejar el error de envío de correo electrónico
                $errorMessage = $e->getMessage();

                return redirect()->route('home')
                    ->with('message', 'El producto se reservó con éxito, pero hubo un error al enviar el correo electrónico. Por favor, contactate con atención al cliente.')
                    ->with('type', 'warning')
                    ->with('error', $errorMessage);


            } */
            
          
        } else {
           // ver si no se graba en la base de datos
        }       
    }





    public function processPending(Request $request)
    {
        echo "Pending";
        dd($request);
    }

    public function processFailure(Request $request)
    {
        echo "Failure";
        dd($request);
    }
}
