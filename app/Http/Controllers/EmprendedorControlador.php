<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailable;

class EmprendedorControlador extends Controller
{
    public function creaEmprendedor(Request $request){
        return view('emprendedor.registrarse');
    }


    public function nuevoEmprendedor(Request $request)
    {
        $emprendedor = Emprendedor::where('identificacionEmprendedor',$request->identificacionEmprendedor)->first();

        if(!$emprendedor){
            Emprendedor::create([
                'identificacionEmprendedor' => $request->identificacionEmprendedor,
                'nombreEmprendedor' => $request->nombreEmprendedor,
                'apellidoEmprendedor' => $request->apellidoEmprendedor,
                'razonSocialEmprendedor' => $request->razonSocialEmprendedor,
                'contrasenaEmprendedor' => Hash::make($request->contrasenaEmprendedor),
                'paginaWebEmprendedor' => $request->paginaWebEmprendedor,
            ]);
            return back()->with('success', 'El emprendedor fue registrado con exito');
        }else{
            return back()->with('error', 'El emprendedor ya se encuentra registrado');
        }

        return back()->with('error', 'Error de servidor');

    }

}
