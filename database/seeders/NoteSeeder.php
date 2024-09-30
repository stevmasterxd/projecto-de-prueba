<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('notes_tables')->insert([
            'title' => 'aprendiendo blade',
            'content' => <<<'content'
                    para imprimir una variable con blade utilizamos esta sintaxis:
                    @{{ $mi_variable }}

                    las directivas de blade comienzan con arroba, ejemplo:
                        
                    @@foreach',
                    content,
        ]);
        DB::table('notes_tables')->insert([
            'title' => '¿Para qué sirve Composer?',
            'content' => 'Con Composer podemos instalar y actualizar frameworks como Laravel o Symfony,así como componentes para generar PDF, procesar pagos con tarjetas, manipular imágenes y mucho más.',
        ]);
        DB::table('notes_tables')->insert([
            'title' => 'Instalación de Laravel',
            'content' => <<<'content'
                    Hay 2 formas de instalar Laravel: la primera es a través con Composer,
                    cual te permite instalar una versión específica de Laravel:
                    composer create-project laravel/laravel curso-laravel-styde "6.*"
                    La segunda es con el instalador de Laravel, la cual instalará la versión actual del framework:
                    laravel new curso-laravel-styde
                    content,
        ]);
        DB::table('notes_tables')->insert([
            'title' => 'Rutas y JSON',
            'content' => <<<'content'
                    Recuerda que si retornas un arreglo en una ruta, Laravel lo va a convertir en JSON automáticamente:
                    ?php

                    Route::get('/', function () {
                    return [
                    'Cursos' => [
                    'Primeros pasos con Laravel',
                    'Crea un panel de control con Laravel',
                    ]
                    ];
                    });
                    Producirá el siguiente resultado:
                    {"Cursos":["Primeros pasos con Laravel","Crea un panel de control con Laravel"]}
                    content,
        ]);
        DB::table('notes_tables')->insert([
            'title' => 'Front Controller',
            'content' => 'Front Controller es un patrón de arquitectura donde un controlador
                            maneja todas las solicitudes o peticiones a un sitio web.',
        ]);
        DB::table('notes_tables')->insert([
            'title' => 'Cambia el formato de parámetros dinámicos',
            'content' => <<<'content'
                     Puedes colocar el siguiente código en el método <code>boot</code>
                    de <code>app/Providers/RouteServiceProvider.php</code>
                    para restringir cualquier parámetro de las rutas a un formato numérico:

                    Route::pattern('nombre-del-parametro', '\d+');
                    Puedes por supuesto usar otras expresiones regulares para restringir a otros formatos.
                    content,
        ]);
    }
}
