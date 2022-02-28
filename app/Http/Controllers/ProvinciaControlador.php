<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;
use Validator;

class ProvinciaControlador extends Controller
{
    public function provincia(Request $request)
    {
        $provincias = Provincia::all();
        return view('provincia.provincia', compact('provincias'));
    }

    public function viewCrearProvincia(Request $request)
    {
        return view('provincia.crearProvincia');
    }

    public function crearProvincia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreProvincia' => 'required',
        ]);

        if ($validator->passes()) {
            try {
                $provincia = new Provincia();
                $provincia->nombreProvincia = $request->nombreProvincia;
                $provincia->save();
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

    public function viewEditarProvincia($idProvincia)
    {
        $provincia = Provincia::where('idProvincia', $idProvincia)->first();
        return view('provincia.editarProvincia', compact('provincia'));
    }

    public function editarProvincia(Request $request, $idProvincia)
    {
        $provincia = Provincia::where('idProvincia', $idProvincia)->first();

        $provincia->nombreProvincia = $request->nombreProvincia;
        $provincia->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function eliminarProvincia($idProvincia)
    {
        try {
            $provincia = Provincia::where('idProvincia', $idProvincia)->first();
            $provincia->delete();
            return response()->json([
                'success' => 'provincia eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
