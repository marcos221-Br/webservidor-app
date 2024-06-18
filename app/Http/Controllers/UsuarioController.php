<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        if (!session()->get('logado')) {
            return redirect('/');
        }

        $erro = '';
        $sucesso = '';
        return view('Usuario', ['erro' => $erro, 'sucesso' => $sucesso]);
    }

    public function change(Request $request)
    {
        if (!session()->get('logado')) {
            return redirect('/');
        }

        $alterado = false;
        $erro = '';
        $sucesso = '';
        $senhaAntiga = $request->input('senha_antiga');
        $senhaNova = $request->input('senha_nova');
        $nome = $request->input('nome_user');

        // Verificação de caracteres especiais no nome
        if (preg_match('/[^a-zA-Z\s]/', $nome)) {
            $erro = 'O nome do usuário não pode conter caracteres especiais.';
            return view('Usuario', ['erro' => $erro, 'sucesso' => $sucesso]);
        }

        $usuario = Usuario::where('oab', session()->get('usuario')->oab)->first();

        // Verifica se o nome do usuário mudou e salva a alteração
        if ($usuario->nome !== $nome) {
            $usuario->nome = $nome;
            $usuario->save();
            $alterado = true;
        }

        // Validação das senhas
        if (!empty($senhaAntiga) && !empty(session()->get('usuario')->senha)) {
            if ($senhaAntiga !== session()->get('usuario')->senha) {
                $erro = 'Senha antiga incorreta.';
            } elseif (empty($senhaNova) || strlen($senhaNova) < 8) {
                $erro = 'A nova senha deve ter pelo menos 8 caracteres.';
            } elseif ($senhaNova === $senhaAntiga) {
                $erro = 'A nova senha deve ser diferente da antiga.';
            } else {
                $usuario->senha = $senhaNova; // Armazenando a nova senha como texto puro
                $usuario->save();
                $alterado = true;
            }
        }

        if ($alterado) {
            // Atualiza o nome do usuário na sessão se o nome foi alterado
            session()->put('usuario', $usuario);

            // Se a senha foi alterada, destrói a sessão e redireciona o usuário para a tela de login
            if (!empty($senhaNova)) {
                session()->flush();
                return redirect('/');
            } else {
                $sucesso = 'Alterações salvas com sucesso.';
            }
        }

        // Se houver erros, salvar na sessão para mostrar ao usuário e redirecionar de volta ao formulário
        return view('Usuario', ['erro' => $erro, 'sucesso' => $sucesso]);
    }
}
