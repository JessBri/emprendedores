<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmprendedorControlador extends Controller
{
    public function creaEmprendedor(Request $request){
        return view('emprendedor.registrarse');
    }

}
