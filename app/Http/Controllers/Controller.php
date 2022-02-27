<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function index(Request $request){

        return view('index.index');

    }

    public function login(Request $request){

        return view('login.login');

    }
    public function prueba(Request $request){

        return view('emails.prueba');

    }
}
