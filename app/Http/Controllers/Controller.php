<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;

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
    public function index(Request $request){

        return view('index.index');

    }

    public function login(Request $request){

        return view('login.login');

    }



    public function logueaSistema(Request $request){

        $emprendedor = Emprendedor::where('correoEmprendedor',$request->correoEmprendedor)
        ->where('contrasenaEmprendedor',md5($request->contrasenaEmprendedor))
        ->where('estadoEmprendedor',true)
        ->first();

        if($emprendedor){
            $request->session()->put('usuarioConectado',$emprendedor);
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['error'=>true]);
        }

    }

    public function recuperaContrasena(Request $request){

        $emprendedor = Emprendedor::where('correoEmprendedor',$request->correoRecuperacion)
        ->first();

        if($emprendedor){

            $codigoGenerado = Str::random(10);
            $correo = $emprendedor->correoEmprendedor;

            $emprendedor->codigoEmprendedor = $codigoGenerado;
            $emprendedor->save();

            $data = [   'link' => 'http://127.0.0.1:8000/password/'.$codigoGenerado,
                'nombre' => $emprendedor->nombreEmprendedor.' '.$emprendedor->apellidoEmprendedor,
                'correo' => $correo,
            ];

            Mail::send('emails.notificacion', $data, function ($message) use ($correo) {
                $message->from('emprendedor.uisrael@gmail.com', 'Proyecto Emprendedores');
                $message->to($correo)->subject('Recuperación de contraseña');
            });

            //$request->session()->put('usuarioConectado',$emprendedor);
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['error'=>true]);
        }

    }


    public function restauraContrasena(Request $request,$codigo){

        $emprendedor = Emprendedor::where('codigoEmprendedor',$codigo)->first();

        if($emprendedor){
            return view('login.restaura',compact('emprendedor'));
        }else{
            return redirect()->route('index');
        }
    }

    public function cambiaNuevaContrasena(Request $request,$codigo){

        $emprendedor = Emprendedor::where('codigoEmprendedor',$codigo)->first();

        if($emprendedor){

            $emprendedor->codigoEmprendedor = "";
            $emprendedor->contrasenaEmprendedor = md5($request->contrasenaEmprendedor);
            $emprendedor->estadoEmprendedor = true;
            $emprendedor->save();
            return response()->json(['success'=>true]);

        }else{
            return response()->json(['error'=>true]);
        }
    }

    public function cerrarSesion(){
        session()->pull('usuarioConectado');
        return redirect()->route('index');
    }
}
