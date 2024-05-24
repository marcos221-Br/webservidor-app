<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\Processo;
use App\Models\Honorario;
use App\Validacao;


class ProcessoController extends Controller
{
    public function index() {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $processos = Processo::where('idusuario',session()->get('usuario')->id)->get();
        return view('Processo',['processos' => $processos]);
    }

    public function visualize(Request $request, $numeroProcesso = '') {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $rotulo = 'Visualizar';
        $erros = [];
        $acao = 'visualizar';
        if(empty($request->input('nmrProcesso'))){
            $processo = Processo::where('numeroprocesso',$numeroProcesso)->where('idusuario',session()->get('usuario')->id)->first();
        }else{
            $processo = Processo::where('numeroprocesso',$request->input('nmrProcesso'))->where('idusuario',session()->get('usuario')->id)->first();
        }
        if(empty($processo)){
            return redirect('/processo');
        }
        $honorario = Honorario::where('idprocesso',$processo->id)->first();
        return view('Form_processo',['rotulo' => $rotulo, 'erros' => $erros, 'acao' => $acao, 'processo' => $processo, 'honorario' => $honorario]);
    }

    public function delete($numeroProcesso) {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $processo = Processo::where('numeroprocesso',$numeroProcesso)->where('idusuario',session()->get('usuario')->id)->first();
        $honorario = Honorario::where('idprocesso',$processo->id)->first();
        $processo->delete();
        $honorario->delete();
        return redirect('/processo');
    }

    public function edit(Request $request, $numeroProcesso = ''){
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $rotulo = 'Editar';
        $erros = [];
        $acao = 'editar';
        if(empty($request->input('nmr_processo'))){
            $processo = Processo::where('numeroprocesso',$numeroProcesso)->where('idusuario',session()->get('usuario')->id)->first();
        }else{
            $processo = Processo::where('numeroprocesso',$request->input('nmr_processo'))->where('idusuario',session()->get('usuario')->id)->first();
            $honorario = Honorario::where('idprocesso',$processo->id)->first();
            $processo->cliente = $request->input('nome_cliente');
            $processo->descricao = $request->input('descricao');
            $processo->proximoprazo = $request->input('data_proximo_prazo');
            $request->input('metade_escritorio') == "sim" ? $processo->escritorio = true : $processo->escritorio = false;
            $honorario->honorario = $request->input('qtd_honorarios');
            $honorario->parcelas = $request->input('nmr_parcelas');
            $processo->save();
            $honorario->save();
            return redirect('/processo');
        }
        if(empty($processo)){
            return redirect('/processo');
        }
        $honorario = Honorario::where('idprocesso',$processo->id)->first();
        return view('Form_processo',['rotulo' => $rotulo, 'erros' => $erros, 'acao' => $acao, 'processo' => $processo, 'honorario' => $honorario]);
    }

    public function include(Request $request){
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $rotulo = 'Incluir';
        $erros = [];
        $acao = 'incluir';
        $processo = new Processo();
        $honorario = new Honorario();
        if(empty($request->input('nmr_processo'))){
            return view('Form_processo',['rotulo' => $rotulo, 'erros' => $erros, 'acao' => $acao, 'processo' => $processo, 'honorario' => $honorario]);
        }else{
            $erros = Validacao::getErros($request);
            if (!empty($erros)) {
                return view('Form_processo',['rotulo' => $rotulo, 'erros' => $erros, 'acao' => $acao, 'processo' => $processo, 'honorario' => $honorario]);
            }
            $processo->numeroprocesso = $request->input('nmr_processo');
            $processo->cliente = $request->input('nome_cliente');
            $processo->descricao = $request->input('descricao');
            $processo->proximoprazo = $request->input('data_proximo_prazo');
            $processo->idusuario = session()->get('usuario')->id;
            $request->input('metade_escritorio') == "sim" ? $processo->escritorio = true : $processo->escritorio = false;
            $processo->save();
            $processo = Processo::where('numeroprocesso',$request->input('nmr_processo'))->where('idusuario',session()->get('usuario')->id)->first();
            $honorario->honorario = $request->input('qtd_honorarios');
            $honorario->parcelas = $request->input('nmr_parcelas');
            $honorario->idprocesso = $processo->id;
            $honorario->save();
            return redirect('/processo');
        }
    }
}
