<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Provincia;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Validator;

class DireccionControlador extends Controller
{
    public function direccion(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $direcciones = Direccion::all();
            return view('direccion.direccion', compact('direcciones'));
        } else {
            abort(404);
        }
    }

    public function viewCrearDireccion(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $provincias = Provincia::get();
            return view('direccion.crearDireccion', compact('provincias'));
        } else {
            abort(404);
        }
    }

    public function consultaCiudadesPorProvincia(Request $request, $idProvincia)
    {
        $ciudades = Ciudad::where('idProvincia', $idProvincia)->get();
        return response()->json([
            'ciudades' => $ciudades,
        ]);
    }

    public function crearDireccion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'direccionDireccion' => 'required',
            'telefonoDireccion' => 'required',
            'idCiudad' => 'required',
        ]);

        if ($validator->passes()) {
            try {
                $direccion = new Direccion();
                $direccion->nombreDireccion = $request->nombreDireccion;
                $direccion->direccionDireccion = $request->direccionDireccion;
                $direccion->telefonoDireccion = $request->telefonoDireccion;
                $direccion->idCiudad = $request->idCiudad;
                $direccion->idEmprendedor = session('usuarioConectado')[
                    'idEmprendedor'
                ];
                $direccion->save();
                return response()->json([
                    'status' => true,
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        } else {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }
    }

    public function viewEditarDireccion($idDireccion)
    {
        if (session()->has('usuarioConectado')) {
            $direccion = Direccion::where('idDireccion', $idDireccion)->first();
            $provincias = Provincia::get();
            return view(
                'direccion.editarDireccion',
                compact('direccion', 'provincias')
            );
        } else {
            abort(404);
        }
    }

    public function editarDireccion(Request $request, $idDireccion)
    {
        $direccion = Direccion::where('idDireccion', $idDireccion)->first();

        $direccion->nombreDireccion = $request->nombreDireccion;
        $direccion->direccionDireccion = $request->direccionDireccion;
        $direccion->telefonoDireccion = $request->telefonoDireccion;
        $direccion->idCiudad = $request->idCiudad;
        $direccion->idEmprendedor = 2;
        $direccion->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function eliminarDireccion($idDireccion)
    {
        try {
            $direccion = Direccion::where('idDireccion', $idDireccion)->first();
            $direccion->delete();
            return response()->json([
                'success' => 'direccion eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
