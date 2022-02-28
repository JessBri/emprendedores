<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoriaControlador;
use App\Http\Controllers\DireccionControlador;
use App\Http\Controllers\ProvinciaControlador;
use App\Http\Controllers\ImagenControlador;
use App\Http\Controllers\EmprendedorControlador;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('index');

//Login

Route::get('/login', [Controller::class, 'login'])->name('iniciaSesion');

Route::post('/login', [Controller::class, 'logueaSistema'])->name(
    'logueaSistema'
);

Route::get('/login/validar', [Controller::class, 'validaLogin'])->name(
    'validaLogin'
);

Route::get('/cerrarsesion', [Controller::class, 'cerrarSesion'])->name(
    'cerrarSesion'
);

//Recuperacion

Route::post('/recuperaContrasena', [
    Controller::class,
    'recuperaContrasena',
])->name('recuperaContrasena');

Route::get('/password/{codigo}', [
    Controller::class,
    'restauraContrasena',
])->name('restauraContrasena');

Route::post('/password/{codigo}', [
    Controller::class,
    'cambiaNuevaContrasena',
])->name('cambiaNuevaContrasena');

//Imagen

Route::get('/imagen', [ImagenControlador::class, 'imagen'])->name('imagen');
Route::get('/imagen/{elemento}', [
    ImagenControlador::class,
    'imagenElemento',
])->name('imagenElemento');
Route::post('/subeImagen', [ImagenControlador::class, 'subeImagen'])->name(
    'subeImagen'
);
Route::post('/eliminaImagen/{idImagen}{idElemento}', [
    ImagenControlador::class,
    'eliminaImagen',
])->name('eliminaImagen');

//Emprendedor

Route::get('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'creaEmprendedor',
])->name('creaEmprendedor');

Route::post('/emprendedor/nuevo', [
    EmprendedorControlador::class,
    'nuevoEmprendedor',
])->name('nuevoEmprendedor');

Route::get('/emprendedor/{codigo}', [
    EmprendedorControlador::class,
    'confirmaEmprendedor',
])->name('confirmaEmprendedor');

Route::get('/emprendedor', [
    EmprendedorControlador::class,
    'perfilEmprendedor',
])->name('perfilEmprendedor');

Route::post('/emprendedor', [
    EmprendedorControlador::class,
    'editaEmprendedor',
])->name('editaEmprendedor');

Route::get('/cambiaContrasena', [
    EmprendedorControlador::class,
    'passwordEmprendedor',
])->name('passwordEmprendedor');

Route::post('/cambiaContrasena', [
    EmprendedorControlador::class,
    'editaPasswordEmprendedor',
])->name('editaPasswordEmprendedor');

//Categoria

Route::get('/categoria', [CategoriaControlador::class, 'categoria'])->name(
    'categoria'
);

Route::get('/categoria/crear', [
    CategoriaControlador::class,
    'crearCategoria',
])->name('crearCategoria');

Route::post('/categoria/validar', [
    CategoriaControlador::class,
    'validarCategoria',
])->name('validarCategoria');

Route::get('/categoria/editar/{categoria}', [
    CategoriaControlador::class,
    'viewEditarCategoria',
])->name('viewEditarCategoria');

Route::put('/categoria/edita/{idCategoria}', [
    CategoriaControlador::class,
    'editarCategoria',
])->name('editarCategoria');

Route::delete('/categoria/eliminar/{idCategoria}', [
    CategoriaControlador::class,
    'eliminarCategoria',
])->name('eliminarCategoria');

//Direcciones

Route::get('/direccion', [DireccionControlador::class, 'direccion'])->name(
    'direccion'
);

Route::get('/direccion/crear', [
    DireccionControlador::class,
    'viewCrearDireccion',
])->name('viewCrearDireccion');

Route::get('/direccion/ciudad/{idProvincia}', [
    DireccionControlador::class,
    'consultaCiudadesPorProvincia',
])->name('consultaCiudadesPorProvincia');

Route::post('/direccion/crear', [
    DireccionControlador::class,
    'crearDireccion',
])->name('crearDireccion');

Route::get('/direccion/editar/{idDireccion}', [
    DireccionControlador::class,
    'viewEditarDireccion',
])->name('viewEditarDireccion');

Route::put('/direccion/editar/{idDireccion}', [
    DireccionControlador::class,
    'editarDireccion',
])->name('editarDireccion');

Route::delete('/direccion/eliminar/{idDireccion}', [
    DireccionControlador::class,
    'eliminarDireccion',
])->name('eliminarDireccion');

//Provincia

Route::get('/provincia', [ProvinciaControlador::class, 'provincia'])->name(
    'provincia'
);

Route::get('/provincia/crear', [
    ProvinciaControlador::class,
    'viewCrearProvincia',
])->name('viewCrearProvincia');

Route::post('/provincia/crear', [
    ProvinciaControlador::class,
    'crearProvincia',
])->name('crearProvincia');

Route::get('/provincia/editar/{idProvincia}', [
    ProvinciaControlador::class,
    'viewEditarProvincia',
])->name('viewEditarProvincia');

Route::put('/provincia/editar/{idProvincia}', [
    ProvinciaControlador::class,
    'editarProvincia',
])->name('editarProvincia');

Route::delete('/provincia/eliminar/{idDireccion}', [
    ProvinciaControlador::class,
    'eliminarProvincia',
])->name('eliminarProvincia');

// Enviar correo
Route::get('enviar', [
    'as' => 'enviar',
    function () {
        //Str::random(10);

        $data = [
            'link' => 'http://127.0.0.1:8000/password/' . Str::random(10),
            'codigo' => Str::random(10),
            'nombre' => 'Jessica Arciniega',
        ];
        Mail::send('emails.notificacion', $data, function ($message) {
            $message->from(
                'emprendedor.uisrael@gmail.com',
                'Proyecto Emprendedores'
            );
            $message
                ->to('luis.borja1722@gmail.com')
                ->subject('Recuperación de contraseña');
        });
        return 'Se envío el email';
    },
]);
