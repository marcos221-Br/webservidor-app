<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processo;

class ProcessoController extends Controller
{
    public function index() {
        $processos = Processo::where('idusuario',session()->get('usuario')->id)->get();
        return view('Processo',['processos' => $processos]);
    }

    public function visualizer(Request $request) {
        return 'oki';
    }
}
