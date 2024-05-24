<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processo;
use App\Models\Honorario;

class HomeController extends Controller
{
    public function index() {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $processos = Processo::where('idusuario',session()->get('usuario')->id)->get();
        $totalProcessos = $processos->count();
        $totalHonorarios = 0;
        foreach($processos as $processo) {
            $honorarios = Honorario::where('idprocesso',$processo->id)->get();
            foreach($honorarios as $honorario){
                $totalHonorarios += $honorario->honorario;
            }
        }
        $processosDia = Processo::where('proximoprazo',date('Y-m-d'))->where('idusuario',session()->get('usuario')->id)->get();
        return view('Home',['totalProcessos' => $totalProcessos, 'totalHonorarios' => $totalHonorarios, 'processosDia' => $processosDia]);
    }
}
