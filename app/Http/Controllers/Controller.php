<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use App\Models\Elemento;
use App\Models\Imagen;
use App\Models\Direccion;
use App\Models\Ciudad;
use App\Models\Provincia;
use App\Models\Categoria;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    public function index(Request $request)
    {

        //PARA CUANDO ESTA EL EMPRENDEDOR CONECTADO
        if (session()->has('usuarioConectado')) {

            $contProductos = Elemento::where('idEmprendedor', session('usuarioConectado')['idEmprendedor'])
                ->where('estadoElemento', 1)
                ->where('tipoElemento', "producto")
                ->get();
            $contServicios = Elemento::where('idEmprendedor', session('usuarioConectado')['idEmprendedor'])
                ->where('estadoElemento', 1)
                ->where('tipoElemento', "servicio")
                ->get();
            $contEventos = Elemento::where('idEmprendedor', session('usuarioConectado')['idEmprendedor'])
                ->where('estadoElemento', 1)
                ->where('tipoElemento', "evento")
                ->get();

            $elementos = Elemento::where('idEmprendedor', session('usuarioConectado')['idEmprendedor'])->where('estadoElemento', 1)->get();

            foreach ($elementos as $elemento) {
                $imagen = Imagen::where('idElemento', $elemento->idElemento)->first();
                $categoria = Categoria::where('idCategoria', $elemento->idCategoria)->first();
                $categoria->idCategoria = $categoria;
                if ($imagen) {
                    $elemento->imagenElemento = $imagen;
                } else {
                    $imagen = new Imagen();
                    $imagen->urlImagen = "uploads/nodisponible.jpg";
                    $elemento->imagenElemento = $imagen;
                }
            }

            return view('index.index', compact('elementos'));
        } else {
            //PARA CUANDO NO ESTA EL EMPRENDEDOR CONECTADO
            $elementos = Elemento::where('estadoElemento', 1)->get();

            $prod = Elemento::where('estadoElemento', 1)
                ->where('tipoElemento', "producto")
                ->get();

            $contProductos = $prod->count();



            $serv = Elemento::where('estadoElemento', 1)
                ->where('tipoElemento', "servicio")
                ->get();

            $contServicios = $serv->count();

            $even = Elemento::where('estadoElemento', 1)
                ->where('tipoElemento', "evento")
                ->get();

            $contEventos = $even->count();

            foreach ($elementos as $elemento) {
                $imagen = Imagen::where('idElemento', $elemento->idElemento)->first();
                $categoria = Categoria::where('idCategoria', $elemento->idCategoria)->first();
                $elemento->idCategoria = $categoria;
                if ($imagen) {
                    $elemento->imagenElemento = $imagen;
                } else {
                    $imagen = new Imagen();
                    $imagen->urlImagen = "uploads/nodisponible.jpg";
                    $elemento->imagenElemento = $imagen;
                }
            }

            return view('index.index', compact('elementos', 'contEventos', 'contServicios', 'contProductos'));
        }
    }

    public function detalleElemento($idElemento)
    {
        $elemento = Elemento::where('idElemento', $idElemento)->first();
        $imagenes = Imagen::where('idElemento', $idElemento)->get();
        $direcciones = Direccion::where('idEmprendedor', $elemento->idEmprendedor)->get();
        foreach ($direcciones as $direccion) {
            $ciudad = Ciudad::where('idCiudad', $direccion->idCiudad)->first();
            $provincia = Provincia::where('idProvincia', $ciudad->idProvincia)->first();
            $direccion->idCiudad = $ciudad;
            $direccion->idCiudad->idProvincia = $provincia;
        }

        if ($elemento) {
            return view('imagen.detalleElemento', compact('elemento', 'imagenes', 'direcciones'));
        }
    }

    public function login(Request $request)
    {

        return view('login.login');
    }



    public function logueaSistema(Request $request)
    {

        $emprendedor = Emprendedor::where('correoEmprendedor', $request->correoEmprendedor)
            ->where('contrasenaEmprendedor', md5($request->contrasenaEmprendedor))
            ->where('estadoEmprendedor', true)
            ->first();

        if ($emprendedor) {
            $request->session()->put('usuarioConectado', $emprendedor);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function recuperaContrasena(Request $request)
    {

        $emprendedor = Emprendedor::where('correoEmprendedor', $request->correoRecuperacion)
            ->first();

        if ($emprendedor) {

            $codigoGenerado = Str::random(10);
            $correo = $emprendedor->correoEmprendedor;

            $emprendedor->codigoEmprendedor = $codigoGenerado;
            $emprendedor->save();

            $data = [
                'link' => 'http://127.0.0.1:8000/password/' . $codigoGenerado,
                'nombre' => $emprendedor->nombreEmprendedor . ' ' . $emprendedor->apellidoEmprendedor,
                'correo' => $correo,
            ];

            Mail::send('emails.notificacion', $data, function ($message) use ($correo) {
                $message->from('emprendedor.uisrael@gmail.com', 'Proyecto Emprendedores');
                $message->to($correo)->subject('Recuperaci??n de contrase??a');
            });

            //$request->session()->put('usuarioConectado',$emprendedor);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }


    public function restauraContrasena(Request $request, $codigo)
    {

        $emprendedor = Emprendedor::where('codigoEmprendedor', $codigo)->first();

        if ($emprendedor) {
            return view('login.restaura', compact('emprendedor'));
        } else {
            return redirect()->route('index');
        }
    }

    public function cambiaNuevaContrasena(Request $request, $codigo)
    {

        $emprendedor = Emprendedor::where('codigoEmprendedor', $codigo)->first();

        if ($emprendedor) {

            $emprendedor->codigoEmprendedor = "";
            $emprendedor->contrasenaEmprendedor = md5($request->contrasenaEmprendedor);
            $emprendedor->estadoEmprendedor = true;
            $emprendedor->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function cerrarSesion()
    {
        session()->pull('usuarioConectado');
        return redirect()->route('index');
    }
}
