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
        
        // recordar precios expresarlos en centavos para un correcto manejo de los decimales. 
        // 1.25 = 125 esto tendrá mas sentido cuando se haga el ABM del producto. Pero se deja listo. 
        DB::table('products')->insert([
            [
                'product_id' => 1,
                'title' => 'Basic',
                'subtitle' => 'También denominado Hosting compartido, nuestro hosting más económico. ',
                'description' => 'Funciona en recursos compartidos. Por lo tanto, es tan bueno como un plan inicial básico. Rendimiento Estándar, 1 sitio web, 1 base de datos. Ideal WordPress, Drupal, Joomla, PrestaShop, Magento',
                'price' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'title' => 'Deluxe',
                'subtitle' => 'Hosting de múltiples sitios con SSL para todos los sitios.',
                'description' => 'Dominio y correo electrónico gratis por un año. Rendimiento Estándar con Sitios web ilimitados y Bases de datos ilimitadas. Ideal para emprendedores, diseñadores y agencias web.',
                'price' => 225000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
