<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert(
            [
                [
                    "category_id"=> 1,
                    "author_id"=> 1,

                    "title"=> "Cómo elegir el mejor hosting para tu sitio web",
                    "content"=> "En la actualidad, elegir el hosting adecuado para tu sitio web es una de las decisiones más importantes que tendrás que tomar. La elección del hosting puede afectar no solo al rendimiento de tu sitio web, sino también a la seguridad y la accesibilidad del mismo.

                    Lo primero que debes tener en cuenta es el tipo de sitio web que estás creando. Si se trata de un sitio web pequeño, con un bajo tráfico y poco contenido multimedia, un hosting compartido puede ser suficiente. Sin embargo, si tu sitio web es más grande, con un alto tráfico y mucho contenido multimedia, puede que necesites un hosting VPS o incluso un servidor dedicado.
                    
                    Otro factor a considerar es la ubicación del servidor. Si tu público objetivo se encuentra en un país en particular, es recomendable que el servidor esté ubicado en ese mismo país para asegurar una conexión rápida y estable.
                    
                    Además, es importante que el hosting ofrezca medidas de seguridad adecuadas, como certificados SSL, copias de seguridad y protección contra ataques de malware.
                    
                    En resumen, elegir el hosting adecuado para tu sitio web es una decisión crucial que puede afectar significativamente al rendimiento y seguridad de tu sitio web. Tómate el tiempo necesario para investigar y comparar diferentes opciones de hosting antes de tomar una decisión final.",
                    "user_id"=> 1,            
                    'created_at' => now(),
                    'updated_at' => now(),
                ],


                [
                    "title"=> "Hosting especial para wordpress",
                    "content"=> "WordPress es una de las plataformas de gestión de contenido más populares en la actualidad, y muchas empresas de hosting ofrecen planes diseñados especialmente para alojar sitios web de WordPress.

                    Si estás pensando en crear un sitio web con WordPress, es importante que elijas un hosting que ofrezca un rendimiento óptimo para esta plataforma. Algunos factores que debes tener en cuenta al elegir un hosting para WordPress incluyen la velocidad de carga, la escalabilidad, la seguridad y la facilidad de uso.
                    
                    En general, los planes de hosting para WordPress ofrecen una configuración preinstalada de la plataforma, lo que te permite comenzar a trabajar en tu sitio web de manera rápida y sencilla. Además, estos planes suelen incluir herramientas de optimización de rendimiento, como caché de página y CDN, para mejorar la velocidad de carga de tu sitio web.
                    
                    No importa si eres un principiante en WordPress o un usuario avanzado, elegir un hosting especializado en esta plataforma puede ayudarte a obtener el mejor rendimiento para tu sitio web.",
                    "user_id"=> 2,
                    "category_id"=> 2,
                    "author_id"=> 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    "title"=> "Hosting especial dedicado",
                    "content"=> "WordPress es una de las plataformas de gestión de contenido más populares en la actualidad, y muchas empresas de hosting ofrecen planes diseñados especialmente para alojar sitios web de WordPress.

                    Si estás pensando en crear un sitio web con WordPress, es importante que elijas un hosting que ofrezca un rendimiento óptimo para esta plataforma. Algunos factores que debes tener en cuenta al elegir un hosting para WordPress incluyen la velocidad de carga, la escalabilidad, la seguridad y la facilidad de uso.
                    
                    En general, los planes de hosting para WordPress ofrecen una configuración preinstalada de la plataforma, lo que te permite comenzar a trabajar en tu sitio web de manera rápida y sencilla. Además, estos planes suelen incluir herramientas de optimización de rendimiento, como caché de página y CDN, para mejorar la velocidad de carga de tu sitio web.
                    
                    No importa si eres un principiante en WordPress o un usuario avanzado, elegir un hosting especializado en esta plataforma puede ayudarte a obtener el mejor rendimiento para tu sitio web.",
                    "user_id"=> 1,
                    "author_id"=> 1,
                    "category_id"=> 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    "title"=> "Último posteo",
                    "content"=> "WordPress es una de las plataformas de gestión de contenido más populares en la actualidad, y muchas empresas de hosting ofrecen planes diseñados especialmente para alojar sitios web de WordPress.

                    Si estás pensando en crear un sitio web con WordPress, es importante que elijas un hosting que ofrezca un rendimiento óptimo para esta plataforma. Algunos factores que debes tener en cuenta al elegir un hosting para WordPress incluyen la velocidad de carga, la escalabilidad, la seguridad y la facilidad de uso.
                    
                    En general, los planes de hosting para WordPress ofrecen una configuración preinstalada de la plataforma, lo que te permite comenzar a trabajar en tu sitio web de manera rápida y sencilla. Además, estos planes suelen incluir herramientas de optimización de rendimiento, como caché de página y CDN, para mejorar la velocidad de carga de tu sitio web.
                    
                    No importa si eres un principiante en WordPress o un usuario avanzado, elegir un hosting especializado en esta plataforma puede ayudarte a obtener el mejor rendimiento para tu sitio web.",
                    "user_id"=> 1,
                    "author_id"=> 1,
                    "category_id"=> 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

        ]

        );
    }
}
