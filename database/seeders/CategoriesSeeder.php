<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1, 
                'name' => 'Novedades',
                'description' => 'Publicaciones relacionadas con las últimas novedades y actualizaciones de los servicios de hosting.',
            ],
            [
                'category_id' => 2, 
                'name' => 'Tutoriales',
                'description' => 'Publicaciones que ofrecen tutoriales paso a paso sobre cómo utilizar determinadas funciones del hosting o cómo realizar tareas relacionadas.',
            ], 
            [
                'category_id' => 3, 
                'name' => 'SEO y marketing en línea',
                'description' => 'Publicaciones que abordan temas relacionados con la optimización para motores de búsqueda (SEO) y estrategias de marketing en línea para sitios web hospedados',
            ], 
            [
                'category_id' => 4, 
                'name' => 'Casos de éxito',
                'description' => 'publicaciones que destacan historias de éxito de clientes que utilizan el hosting y han logrado resultados positivos.',
            ] 
        ]);
    }
}