@extends('layout.Layout')

@section('titulo', 'Usuario')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/processos.css"/>
    <link rel="stylesheet" type="text/css" href="/css/form.css"/>
@endsection

@section('conteudo')
    <main>
        <h1>Perfil do Usuário</h1>

        <form action="/usuario" class="container-form" method="post">
            @csrf
            <label for="nome_user" class="rotulo">
                Nome de usuário
                <input type="text" class="input-dado" name="nome_user" id="nome_user" value="{{ session()->get('usuario')->nome; }}">
            </label>

            <label for="oab_user" class="rotulo">
                OAB
                <input type="text" class="input-dado" name="oab_user" id="oab_user" value="{{ session()->get('usuario')->oab; }}" disabled>
            </label>
            <br>
            <h1>Trocar senha</h1>
            <br>

            @if($erro != '')
                <div style="background-color: rgba(255, 0, 0, 0.63); padding: 10px; border-radius: 5px;">
                    <p style="color: white; font-weight: bold;">{{ $erro }}</p>
                </div>
            @endif

            <label for="senha_antiga_user" class="rotulo">
                Senha Antiga
                <input type="password" class="input-dado" name="senha_antiga" id="senha_antiga" maxlength="45" >
            </label>

            <label for="senha_nova_user" class="rotulo">
                Senha Nova
                <input type="password" class="input-dado" name="senha_nova" id="senha_nova" maxlength="45" >
            </label>

            <input type="submit" value="Confirmar" class="button-enviar">
        </form>
    </main>
@endsection
