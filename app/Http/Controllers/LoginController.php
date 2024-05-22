<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index() {
        $erro = false;
        return view('Login', ['erro' => $erro]);
    }

    public function login(Request $request) {
        $oab = $request->input('oab');
        $senha = $request->input('senha');

        $usuario = new Usuario($oab,$senha);

        if($usuario->buscarUsuario()){
            return redirect('/home');
        }
        $erro = true;
        return view('Login', ['erro' => $erro]);
    }
}
