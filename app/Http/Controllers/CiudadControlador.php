<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Validator;

class CiudadControlador extends Controller
{
    public function ciudad(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $ciudades = Ciudad::all();
            return view('ciudad.ciudad', compact('ciudades'));
        } else {
            return view('login.login');
        }
    }

    public function viewCrearCiudad(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $provincias = Provincia::get();
            return view('ciudad.crearCiudad', compact('provincias'));
        } else {
            return view('login.login');
        }
    }

    public function crearCiudad(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreCiudad' => 'required',
        ]);

        if ($validator->passes()) {
            try {
                $ciudad = new Ciudad();
                $ciudad->nombreCiudad = $request->nombreCiudad;
                $ciudad->idProvincia = $request->idProvincia;
                $ciudad->save();
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

    public function viewEditarCiudad($idCiudad)
    {
        if (session()->has('usuarioConectado')) {
            $ciudad = Ciudad::where('idCiudad', $idCiudad)->first();
            $provincias = Provincia::get();
            return view('ciudad.editarCiudad', compact('ciudad', 'provincias'));
        } else {
            return view('login.login');
        }
    }

    public function editarCiudad(Request $request, $idCiudad)
    {
        $ciudad = Ciudad::where('idCiudad', $idCiudad)->first();

        $ciudad->nombreCiudad = $request->nombreCiudad;
        $ciudad->idProvincia = $request->idProvincia;
        $ciudad->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function eliminarCiudad($idCiudad)
    {
        try {
            $ciudad = Ciudad::where('idCiudad', $idCiudad)->first();
            $ciudad->delete();
            return response()->json([
                'success' => 'ciudad eliminada exitosamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
