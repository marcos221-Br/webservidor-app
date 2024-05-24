@extends('layout.Layout')

@section('titulo', 'Processos')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/table.css"/>
    <link rel="stylesheet" type="text/css" href="/css/processos.css"/>
    <link rel="stylesheet" type="text/css" href="/css/modal.css"/>
    <link rel="stylesheet" type="text/css" href="/css/form.css"/>
    <script src="/js/modal.js"></script>
@endsection

@section('conteudo')
    <main>
        <h1>Processos</h1>
        <section class="container-busca">
            <form method="post" action="/processo/visualizar">
                @csrf
                <label class="barra-busca">
                    <input type="text" maxlength="16" name="nmrProcesso" placeholder="Informe o número do processo..." class="input-processo">
                    <button type="submit" name="pesquisar"><img src="/images/icons/search_icon.png" alt="Ícone de busca"></button>
                </label>
            </form>
        </section>

        <section class="container-button">
            <ul>
                <li><a href="/processo/incluir" class="button-acao"><img src="/images/icons/incluir.png" alt="Icon Incluir">INCLUIR</a></li>
            </ul>
        </section>

        @if(isset($_GET['deleted']) && $_GET['deleted'])
            <div id="confirmModal">
                <div class="modal-content bg-confirm">
                    <h2>Processo Excluído</h2>
                    <p>O processo <span id="numero_processo"></span> foi excluído com sucesso!</p>
                    <button onclick="document.getElementById('confirmModal').style.display='none'" class="cancel-button" style="background-color: #2BD968">Ok</button>
                </div>
                <div class="modal-background"></div>
            </div>
        @endif

        @if(isset($_GET['create']) && $_GET['create'])
            <div id="createModal">
                <div class="modal-content bg-confirm">
                    <h2>Processo Cadastrado com Sucesso!</h2>
                    <p>O processo <span id="numero_processo_create"></span> foi  Cadastrado com sucesso!</p>
                    <button onclick="document.getElementById('createModal').style.display='none'" class="cancel-button" style="background-color: #2BD968">Ok</button>
                </div>
                <div class="modal-background"></div>
            </div>
        @endif

        @if(isset($_GET['editar']) && $_GET['editar'])
            <div id="editModal">
                <div class="modal-content bg-confirm">
                    <h2>Processo Editado com Sucesso!</h2>
                    <p>O processo <span id="numero_processo_edit"></span> foi editado com sucesso!</p>
                    <button onclick="document.getElementById('editModal').style.display='none'" class="cancel-button" style="background-color: #2BD968">Ok</button>
                </div>
                <div class="modal-background"></div>
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Número do Processo</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Escritório</th>
                    <th colspan="3" style="text-align: center">Opções</th>
                </tr>
            </thead>

        <tbody>
        @foreach($processos as $processo)
            <tr>
                <td>{{ $processo->numeroprocesso }}</td>
                <td>{{ $processo->cliente }}</td>
                <td>{{ $processo->descricao }}</td>
                <td>@if($processo->escritorio)
                        Sim
                    @else
                        Não
                    @endif
                </td>
                <td><a href="/processo/editar/{{ $processo->numeroprocesso }}"><img src="/images/icons/edit_icon.png" alt="Ícone Editar"></a></td>
                <td><a href="/processo/visualizar/{{ $processo->numeroprocesso }}"><img src="/images/icons/visibility_icon.png" alt="Ícone Visualizar"></a></td>
                <td><a href="#" onclick="showDeleteModal('{{ $processo->numeroprocesso }}');"><img src="/images/icons/delete.png" alt="Ícone Excluir"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal de Confirmação -->
    <div id="deleteModal">
        <div class="modal-content">
            <h2>Confirmação de Exclusão</h2>
            <p>Tem certeza que deseja excluir este processo? <span id="numero_processo"></span></p>
            <button id="confirmDelete">Confirmar</button>
            <button onclick="document.getElementById('deleteModal').style.display='none'" class="cancel-button">Cancelar</button>
        </div>
        <div class="modal-background"></div>
    </div>
</main>

@endsection
