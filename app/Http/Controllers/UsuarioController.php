<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $erro = '';
        return view('Usuario', ['erro' => $erro]);
    }

    public function change(Request $request) {
        if(!session()->get('logado')){
            return redirect('/');
        }
        
        $senhaAntiga = $request->input('senha_antiga');
        $senhaNova = $request->input('senha_nova');
        $nome = $request->input('nome_user');

        // Validação das senhas
        if ($senhaAntiga !== session()->get('usuario')->senha) {
            $erro = 'Senha antiga incorreta.';
        } elseif (empty($senhaNova) || strlen($senhaNova) < 8) {
            $erro = 'A nova senha deve ter pelo menos 8 caracteres.';
        } elseif ($senhaNova === $senhaAntiga) {
            $erro = 'A nova senha deve ser diferente da antiga.';
        } else {
            // Tudo ok, pode atualizar a senha e o nome
            $usuario = Usuario::where('oab',session()->get('usuario')->oab)->first();

            $usuario->senha = $senhaNova; // Armazenando a nova senha como texto puro
            $usuario->nome = $nome;

            $usuario->save();

            // Destrói a sessão e redireciona o usuário para a tela de login
            session()->flush();
            return redirect('/');
        }

        // Se houver erros, salvar na sessão para mostrar ao usuário e redirecionar de volta ao formulário
        return view('Usuario', ['erro' => $erro]);
    }
}
