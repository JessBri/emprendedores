<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Imagen;
use App\Models\Direccion;
use App\Models\Ciudad;
use App\Models\Provincia;
use App\Models\Emprendedor;
use App\Models\Elemento;
use Illuminate\Http\Request;

class CompraControlador extends Controller
{
    public function compra(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $compras = Compra::where(
                'idEmprendedor',
                session('usuarioConectado')['idEmprendedor']
            )
                ->with('elementos')
                ->get();

            foreach ($compras as $compra) {
                $imagen = Imagen::where(
                    'idElemento',
                    $compra->elementos->idElemento
                )->first();
                if ($imagen) {
                    $compra->elementos->imagenElemento = $imagen;
                } else {
                    $imagen = new Imagen();
                    $imagen->urlImagen = 'uploads/nodisponible.jpg';
                    $compra->elementos->imagenElemento = $imagen;
                }
            }
            return view('compra.compra', compact('compras'));
        } else {
            return view('login.login');
        }
    }

    public function venta(Request $request)
    {
        if (session()->has('usuarioConectado')) {
            $compras = Compra::all();
            if ($compras) {
                foreach ($compras as $key => $compra) {
                    if (
                        $compra->elementos->idEmprendedor !=
                        session('usuarioConectado')['idEmprendedor']
                    ) {
                        if ($compras[$key]) {
                            unset($compras[$key]);
                        }
                    } else {
                        $imagen = Imagen::where(
                            'idElemento',
                            $compra->elementos->idElemento
                        )->first();
                        if ($imagen) {
                            $compra->elementos->imagenElemento = $imagen;
                        } else {
                            $imagen = new Imagen();
                            $imagen->urlImagen = 'uploads/nodisponible.jpg';
                            $compra->elementos->imagenElemento = $imagen;
                        }

                        $emprendedor = Emprendedor::where(
                            'idEmprendedor',
                            $compra->idEmprendedor
                        )->first();
                        $compra->idEmprendedor = $emprendedor;
                    }
                }
            }
            return view('compra.venta', compact('compras'));
        } else {
            return view('login.login');
        }
    }

    public function crearCompra(Request $request)
    {
        try {
            $compra = new Compra();
            $compra->cantidadCompra = $request->cantidadCompra;
            $compra->idEmprendedor = session('usuarioConectado')[
                'idEmprendedor'
            ];
            $compra->idElemento = $request->idElemento;
            $compra->save();

            $elemento = Elemento::where(
                'idElemento',
                $request->idElemento
            )->first();
            $elemento->cantidadElemento =
                $elemento->cantidadElemento - $compra->cantidadCompra;
            $elemento->save();

            return response()->json([
                'status' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function editarCompra(Request $request, $idCompra)
    {
        $compra = Compra::where('idCompra', $idCompra)->first();

        $compra->calificacionCompra = 4;
        $compra->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function detalleCompra($idCompra)
    {
        $compra = Compra::where('idCompra', $idCompra)
            ->with('elementos')
            ->first();
        $vendedor = Emprendedor::where(
            'idEmprendedor',
            $compra->elementos->idEmprendedor
        )->first();
        $direcciones = Direccion::where(
            'idEmprendedor',
            $compra->elementos->idEmprendedor
        )->get();
        foreach ($direcciones as $direccion) {
            $ciudad = Ciudad::where('idCiudad', $direccion->idCiudad)->first();
            $provincia = Provincia::where(
                'idProvincia',
                $ciudad->idProvincia
            )->first();
            $direccion->idCiudad = $ciudad;
            $direccion->idCiudad->idProvincia = $provincia;
        }

        if ($compra) {
            return view(
                'compra.detalleCompra',
                compact('compra', 'vendedor', 'direcciones')
            );
        }
    }
}
