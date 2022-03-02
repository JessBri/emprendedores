<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Elemento;
use App\Models\Imagen;
use App\Models\Emprendedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ElementoControlador extends Controller
{
    public function elemento(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $idemprendedor = session('usuarioConectado')['idEmprendedor'];
            $emprendedor = Emprendedor::where('idEmprendedor', '=', $idemprendedor)->first();
            $elementos = Elemento::all()->where('idEmprendedor', '=', $idemprendedor);
            return view('elemento.elemento', compact('elementos', 'emprendedor'));
        } else {
            return redirect()->route('index');
        }
    }



    public function viewCrearElemento(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $categorias = Categoria::get();
            return view('elemento.crearElemento', compact('categorias'));
        } else {
            return redirect()->route('index');
        }
    }


    public function nuevoElemento(Request $request)
    {
        if (session()->has('usuarioConectado')) {

            $fInicio = Carbon::parse($request->fechaInicioFecha);
            $fFin = Carbon::parse($request->fechaFinFecha);


            Elemento::create([
                'nombreElemento' => $request->nombreElemento,
                'descripcionElemento' => $request->descripcionElemento,
                'precioElemento' => $request->precioElemento,
                'estadoElemento' => $request->estadoElemento,
                'idCategoria' => $request->idCategoria,
                'idEmprendedor' => session('usuarioConectado')['idEmprendedor'],
                'tipoElemento' => $request->tipoElemento,
                'fechaInicioElemento' => $fInicio->format('Y/m/d'),
                'fechaFinElemento' => $fFin->format('Y/m/d')
            ]);

            return back()->with('success', 'El elemento fue registrado exitosamente.');
        } else {
            return back()->with('error', 'El elemento ya se encuentra registrado');
        }

        return back()->with('error', 'Error de servidor');
    }

    public function viewEditarElemento($idElemento)
    {
        if (session()->has('usuarioConectado')) {
            $elemento = Elemento::where('idElemento', $idElemento)->first();
            $categorias = Categoria::get();
            return view(
                'elemento.editarElemento',
                compact('elemento', 'categorias')
            );
        } else {
            return redirect()->route('index');
        }
    }


    public function editarElemento(Request $request, $idElemento)
    {
        $elemento = Elemento::where('idElemento', $idElemento)->first();
        if ($elemento) {

            $fInicio = Carbon::parse($request->fechaInicioFecha);
            $fFin = Carbon::parse($request->fechaFinFecha);

            $elemento->nombreElemento = $request->nombreElemento;
            $elemento->descripcionElemento = $request->descripcionElemento;
            $elemento->precioElemento = $request->precioElemento;
            $elemento->estadoElemento = $request->estadoElemento;
            $elemento->tipoElemento = $request->tipoElemento;
            $elemento->fechaInicioElemento = $fInicio->format('Y/m/d');
            $elemento->fechaFinElemento = $fFin->format('Y/m/d');

            $elemento->save();

            return back()->with('success', 'La información fue actualizada correctamente.');
        } else {
            return back()->with('error', 'Error al actualizar la información');
        }
    }

    public function eliminarElemento($idElemento)
    {
        try {
            $imagenes = Imagen::where('idElemento', $idElemento)->get();

            foreach ($imagenes as $image) {
                $image_path = public_path('uploads') . '/' . $image->nombreImagen;
                unlink($image_path);
                $image->delete();
            }

            $elemento = Elemento::where('idElemento', $idElemento)->first();
            $elemento->delete();
            return response()->json([
                'success' => 'direccion eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
