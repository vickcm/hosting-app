<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function show()
    {
        $products = Product::whereIn('product_id', [1,2])->get();
        
        //configuramos el sdk de mp con nuestras credenciales de acceso
        \MercadoPago\SDK::setAccessToken(config('mercadopago.accessToken'));
        
        //creamos la preferencia, cobro que vamos a pedirle al usuario
        //para crearla, como requisito tenemos que asociarle al menos un item
        // los items a cobrar deben ser instancia de la clase \MercadoPago\Item y deben asignarse como un array a la propiedad items de la preferencia
        $items = [];
        foreach ($products as $product) {
            $item = new \MercadoPago\Item();
            $item->title = $product->title;
            $item->quantity = 1;
            $item->unit_price = $product->price;
            $items[] = $item;
        }

        $preference = new \MercadoPago\Preference();
        $preference->items = $items;
        //se genera el id aca para poder usarlo en la vista
        $preference->save();

        return view('mp.show', [
            'products' => $products,
            'preference' => $preference,
            'publicKey' => config('mercadopago.publicKey'),
        ]);
    }
}
