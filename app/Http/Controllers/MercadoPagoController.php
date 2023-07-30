<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    public function showV2()
    {
        $products = Product::whereIn('product_id', [1,2])->get();
        
        $payment = new \App\PaymentProviders\MercadoPagoPayment;
        $payment 
            ->addItems($products)
            ->withBackUrls(
                route('mp.success'),
                route('mp.pending'),
                route('mp.failure')
            )
            ->withAutoReturn()
            ->save();

        return view('mp.show-v2', [
            'products' => $products,
            'payment' => $payment,
        ]);
    }

    public function processSuccess (Request $request)
    {
        // aca podriamos guardar los datos de que la compra se realizo correctamente, para habilitar el servicio, marcar como abonado los productos para proceder a su envio, etc
        echo"Succes";
        dd($request);
    }

    public function processPending (Request $request)
    {
        echo"Pending";
        dd($request);
    }

    public function processFailure (Request $request)
    {
        echo"Failure";
        dd($request);
    }
}
