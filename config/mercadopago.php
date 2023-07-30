<?php
return [
    //los valores asociados a las claves de este array van a poder obtenerse con la funcion config usando
    //como parametro un string con el formato "archivo.clave"
    //ejemplo: config('mercadopago.access_token')
    'publicKey' => env('MERCADOPAGO_PUBLIC_KEY'),
    'accessToken' => env('MERCADOPAGO_ACCESS_TOKEN'),
];