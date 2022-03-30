<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmprendedorControlador extends Controller
{
    public function creaEmprendedor(Request $request)
    {
        return view('emprendedor.registrarse');
    }

    public function creaComprador(Request $request)
    {
        return view('emprendedor.crearUsuario');
    }

    public function perfilEmprendedor(Request $request)
    {
        $idemprendedor = session('usuarioConectado')['idEmprendedor'];
        $emprendedor = Emprendedor::where(
            'idEmprendedor',
            '=',
            $idemprendedor
        )->first();
        return view('emprendedor.editaEmprededor', compact('emprendedor'));
    }

    public function nuevoEmprendedor(Request $request)
    {
        $emprendedor = Emprendedor::where(
            'identificacionEmprendedor',
            $request->identificacionEmprendedor
        )
            ->orWhere('correoEmprendedor', $request->correoEmprendedor)
            ->first();

        if (!$emprendedor) {
            $codigoGenerado = Str::random(10);
            Emprendedor::create([
                'identificacionEmprendedor' =>
                    $request->identificacionEmprendedor,
                'nombreEmprendedor' => $request->nombreEmprendedor,
                'apellidoEmprendedor' => $request->apellidoEmprendedor,
                'razonSocialEmprendedor' => $request->razonSocialEmprendedor,
                'correoEmprendedor' => $request->correoEmprendedor,
                'contrasenaEmprendedor' => md5($request->contrasenaEmprendedor),
                'paginaWebEmprendedor' => $request->paginaWebEmprendedor,
                'tipoEmprendedor' => $request->tipoEmprendedor,
                'codigoEmprendedor' => $codigoGenerado,
                'estadoEmprendedor' => false,
            ]);

            $correo = $request->correoEmprendedor;
            $data = [
                'link' =>
                    'http://127.0.0.1:8000/emprendedor/' . $codigoGenerado,
                'nombre' =>
                    $request->nombreEmprendedor .
                    ' ' .
                    $request->apellidoEmprendedor,
                'correo' => $correo,
            ];

            Mail::send('emails.plantillaConfirmacion', $data, function (
                $message
            ) use ($correo) {
                $message->from(
                    'emprendedor.uisrael@gmail.com',
                    'Proyecto Emprendedores'
                );
                $message
                    ->to($correo)
                    ->subject('Confirmación de registro de cuenta');
            });

            return back()->with(
                'success',
                'Hemos recibido tu petición de creación, por favor revisa tu correo electrónico para culminar la creación del emprendedor.'
            );
        } else {
            return back()->with(
                'error',
                'El emprendedor ya se encuentra registrado'
            );
        }

        return back()->with('error', 'Error de servidor');
    }

    public function confirmaEmprendedor(Request $request, $codigo)
    {
        $emprendedor = Emprendedor::where(
            'codigoEmprendedor',
            $codigo
        )->first();

        if ($emprendedor) {
            $emprendedor->codigoEmprendedor = '';
            $emprendedor->estadoEmprendedor = true;
            $emprendedor->save();
            $request->session()->put('usuarioConectado', $emprendedor);
            return view('emprendedor.bienvenida', compact('emprendedor'));
        } else {
            return redirect()->route('index');
        }
    }

    public function passwordEmprendedor(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            return view('emprendedor.cambiaPassword');
        } else {
            abort(404);
        }
    }

    public function editaEmprendedor(Request $request)
    {
        $emprendedor = Emprendedor::where(
            'idEmprendedor',
            session('usuarioConectado')['idEmprendedor']
        )->first();
        if ($emprendedor) {
            $emprendedor->identificacionEmprendedor =
                $request->identificacionEmprendedor;
            $emprendedor->nombreEmprendedor = $request->nombreEmprendedor;
            $emprendedor->apellidoEmprendedor = $request->apellidoEmprendedor;
            $emprendedor->correoEmprendedor = $request->correoEmprendedor;
            $emprendedor->razonSocialEmprendedor =
                $request->razonSocialEmprendedor;
            $emprendedor->paginaWebEmprendedor = $request->paginaWebEmprendedor;

            $emprendedor->save();

            $request->session()->put('usuarioConectado', $emprendedor);

            return back()->with(
                'success',
                'La información fue actualizada correctamente.'
            );
        } else {
            return back()->with('error', 'Error al actualizar la información');
        }
    }

    public function editaPasswordEmprendedor(Request $request)
    {
        $emprendedor = Emprendedor::where(
            'idEmprendedor',
            session('usuarioConectado')['idEmprendedor']
        )->first();
        if ($emprendedor) {
            $emprendedor->contrasenaEmprendedor = md5(
                $request->contrasenaEmprendedor
            );
            $emprendedor->save();
            return back()->with(
                'success',
                'La contraseña fue actualizada correctamente.'
            );
        } else {
            return back()->with('error', 'Error al actualizar la información');
        }
    }
}
