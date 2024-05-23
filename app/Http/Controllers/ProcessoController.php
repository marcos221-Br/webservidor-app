<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\Processo;
use App\Models\Honorario;
use App\Http\Controllers\Utils\Validacao;

class ProcessoController extends Controller
{
    public function index() {
        $processos = Processo::where('idusuario',session()->get('usuario')->id)->get();
        return view('Processo',['processos' => $processos]);
    }

    public function visualizer(Request $request, $numeroProcesso = '') {
        $rotulo = 'Visualizar';
        $erros = [];
        $acao = 'visualizar';
        if(empty($request->input('nmrProcesso'))){
            $processo = Processo::where('numeroprocesso',$numeroProcesso)->where('idusuario',session()->get('usuario')->id)->first();
        }else{
            $processo = Processo::where('numeroprocesso',$request->input('nmrProcesso'))->where('idusuario',session()->get('usuario')->id)->first();
        }
        $honorario = Honorario::where('idprocesso',$processo->id)->first();
        return view('Form_processo',['rotulo' => $rotulo, 'erros' => $erros, 'acao' => $acao, 'processo' => $processo, 'honorario' => $honorario]);
    }
}
