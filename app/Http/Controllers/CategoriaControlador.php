<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Validator;

class CategoriaControlador extends Controller
{
    public function categoria(Request $request)
    {
        $categorias = Categoria::get();
        return view('categoria.categoria', compact('categorias'));
    }

    public function crearCategoria(Request $request)
    {
        return view('categoria.crearCategoria');
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
        $categoria = Categoria::where('idCategoria', $idCategoria)->first();
        return view('categoria.editarCategoria', compact('categoria'));
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
