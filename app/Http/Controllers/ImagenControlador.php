<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenControlador extends Controller
{
    public function imagen(Request $request){

        return view('imagen.imagen');

    }

    public function imagenElemento($idElemento){
        $elemento = Elemento::where('idElemento',$idElemento)->first();
        $imagenes = Imagen::where('idElemento',$idElemento)->get();
        if($elemento){
            return view('imagen.imagenElemento', compact('elemento','imagenes'));
        }
    }




    public function subeImagen(Request $request)
    {
        $request->validate([
          'images' => 'required',
        ]);

        if ($request->hasfile('images')) {
            $id = 1;
            $elemento = Elemento::where('idElemento',$request->idElemento)->first();
            $images = $request->file('images');

            foreach($images as $image) {

                $name = $elemento->nombreElemento."_".$image->getClientOriginalName();
                $image->move(public_path('uploads'), $name);
                $data[] = $name;

                Imagen::create([
                    'nombreImagen' => $name,
                    'urlImagen' => 'uploads/'.$name,
                    'ordenImagen' => 1,
                    'idElemento' => $elemento->idElemento,
                ]);


            }
        }

        return back()->with('success', 'Información de imagen cargada con exito');
    }

    public function eliminaImagen($idImagen,$idElemento){
        try {
            $img = Imagen::where('idImagen',$idImagen)->first();
            $image_path = public_path('uploads').'/'.$img->nombreImagen;
            unlink($image_path);
            $img->delete();
            return redirect()->route('imagenElemento',$idElemento);
        }
        catch(\Exception  $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

}
