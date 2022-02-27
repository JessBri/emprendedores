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
        $direcciones = Direccion::all();
        return view('direccion.direccion', compact('direcciones'));
    }

    public function viewCrearDireccion(Request $request)
    {
        $provincias = Provincia::get();
        return view('direccion.crearDireccion', compact('provincias'));
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
                $direccion->correoDireccion = $request->correoDireccion;
                $direccion->idCiudad = $request->idCiudad;
                $direccion->idEmprendedor = 1;
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
        $direcciones = Direccion::where('idDireccion', $idDireccion)->first();
        return view('direccion.editarDireccion', compact('direcciones'));
    }
}
