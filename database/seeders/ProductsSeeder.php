<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Para interactuar con las tablas, vamos a usar la clase DB de Laravel, que nos da acceso al
        // "Query Builder".
        DB::table('products')->insert([
            [
             
                'title' => 'Web Hosting Mensual',
                'subtitle' => 'También denominado Hosting compartido, nuestro hosting más económico. ',
                'description' => 'Funciona en recursos compartidos. Por lo tanto, es tan bueno como un plan inicial básico. Rendimiento Estándar, 1 sitio web, 1 base de datos. Ideal WordPress, Drupal, Joomla, PrestaShop, Magento',
                'price' => 1250,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
             
                'title' => 'Deluxe',
                'subtitle' => 'Hosting de múltiples sitios con SSL para todos los sitios.',
                'description' => 'Dominio y correo electrónico gratis por un año. Rendimiento Estándar con Sitios web ilimitados y Bases de datos ilimitadas. Ideal para emprendedores, diseñadores y agencias web.',
                'price' => 2250,
                'created_at' => now(),
                'updated_at' => now(),
            ]
         
        ]);
    }
}
