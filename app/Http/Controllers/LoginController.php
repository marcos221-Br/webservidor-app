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

        $usuario = Usuario::where('oab',$oab)->first();

        if($usuario != null && $usuario->senha == $senha){
            session(['usuario' => $usuario]);
            return redirect('/home');
        }
        $erro = true;
        return view('Login', ['erro' => $erro]);
    }

    public function logout() {
        session()->flush();
        return redirect('/');
    }
}
