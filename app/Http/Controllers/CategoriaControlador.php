<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Validator;

class CategoriaControlador extends Controller
{
    public function categoria(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $categorias = Categoria::get();
            return view('categoria.categoria', compact('categorias'));
        } else {
            abort(404);
        }
    }

    public function crearCategoria(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            return view('categoria.crearCategoria');
        } else {
            abort(404);
        }
    }

    //Para validar el registro nuevo lugar
    public function validarCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreCategoria' => 'required',
        ]);

        if ($validator->passes()) {
            try {
                $categoria = new Categoria();
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();
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

    public function viewEditarCategoria($idCategoria)
    {
        if (session()->has('usuarioConectado')) {
            $categoria = Categoria::where('idCategoria', $idCategoria)->first();
            return view('categoria.editarCategoria', compact('categoria'));
        } else {
            abort(404);
        }
    }

    public function editarCategoria(Request $request, $idCategoria)
    {
        $categoria = Categoria::where('idCategoria', $idCategoria)->first();

        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function eliminarCategoria($idCategoria)
    {
        try {
            $categoria = Categoria::where('idCategoria', $idCategoria)->first();
            $categoria->delete();
            return response()->json([
                'success' => 'categoria eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
