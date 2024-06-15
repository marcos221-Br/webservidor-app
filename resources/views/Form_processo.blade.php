@extends('layout.Layout')

@section('titulo', 'Formulário - Processos')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/processos.css"/>
    <link rel="stylesheet" type="text/css" href="/css/form.css"/>
@endsection

@section('conteudo')
    <main class="container">
        <h1>{{ $rotulo }} Processo</h1>
        <a href="/processo" id="btn_voltar" class="button-acao"><img src="/images/icons/voltar.png" alt="Icon Voltar">Voltar</a>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div style="background-color: rgba(255, 0, 0, 0.63); padding: 10px; border-radius: 5px;">
                    <p style="color: white; font-weight: bold;">{{ $error }}</p>
                </div>
            @endforeach
        @endif

        <form action="{{ $acao == 'editar' ? '/processo/editar' : '/processo/incluir' }}" class="container-form"
              method="post">
            @csrf
            <label class="rotulo" style=" @if($acao == 'editar') display: none @endif ">
                Número do processo *
                <input placeholder="Informe o número do processo" type="text" name="nmr_processo" id="nmr_processo"
                       maxlength="16" class="input-dado"
                       value="{{ old('nmr_processo', $processo->numeroprocesso) }}"
                       style=" @if($acao == 'editar') display: none @endif "
                    {{ $acao == 'visualizar' ? 'disabled' : '' }}>
            </label>

            <label class="rotulo">
                Nome Cliente *
                <input placeholder="Informe o nome do cliente" type="text" name="nome_cliente" id="nome_cliente"
                       class="input-dado"
                       value="{{ old('nome_cliente', $processo->cliente) }}" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
            </label>

            <label class="rotulo">
                Descrição
                <input placeholder="Informe a descrição" type="text" name="descricao" id="descricao" class="input-dado"
                       value="{{ old('descricao', $processo->descricao) }}" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
            </label>

            <label class="rotulo">
                Próximo prazo *
                <input type="date" name="data_proximo_prazo" id="data_proximo_prazo" class="input-dado"
                       value="{{ old('data_proximo_prazo', $processo->proximoprazo) }}" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
            </label>

            <label class="rotulo">
                Honorários:
                <input type="number" id="qtd_honorarios" name="qtd_honorarios" min="0" step="0.01" placeholder="R$0.00"
                       class="input-dado"
                       value="{{ old('qtd_honorarios', $honorario->honorario) }}" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
            </label>

            <label class="rotulo">Selecione o número de parcelas
                <select id="nmr_parcelas" name="nmr_parcelas" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
                    <option value="0" {{ old('nmr_parcelas', $honorario->parcelas) == 0 ? 'selected' : '' }}>
                        Selecione...
                    </option>
                    <option value="1" {{ old('nmr_parcelas', $honorario->parcelas) == 1 ? 'selected' : '' }}>1 parcela
                    </option>
                    <option value="2" {{ old('nmr_parcelas', $honorario->parcelas) == 2 ? 'selected' : '' }}>2
                        parcelas
                    </option>
                    <option value="3" {{ old('nmr_parcelas', $honorario->parcelas) == 3 ? 'selected' : '' }}>3
                        parcelas
                    </option>
                    <option value="4" {{ old('nmr_parcelas', $honorario->parcelas) == 4 ? 'selected' : '' }}>4
                        parcelas
                    </option>
                    <option value="5" {{ old('nmr_parcelas', $honorario->parcelas) == 5 ? 'selected' : '' }}>5
                        parcelas
                    </option>
                    <option value="6" {{ old('nmr_parcelas', $honorario->parcelas) == 6 ? 'selected' : '' }}>6
                        parcelas
                    </option>
                </select>
            </label>

            <label class="rotulo">
                Metade para o escritório
                <select id="metade_escritorio" name="metade_escritorio" {{ $acao == 'visualizar' ? 'disabled' : '' }}>
                    <option value="padrao">Selecione...</option>
                    <option
                        value="sim" {{ old('metade_escritorio', $processo->escritorio ? 'sim' : 'nao') == 'sim' ? 'selected' : '' }}>
                        Sim
                    </option>
                    <option
                        value="nao" {{ old('metade_escritorio', $processo->escritorio ? 'sim' : 'nao') == 'nao' ? 'selected' : '' }}>
                        Não
                    </option>
                </select>
            </label>

            <input type="submit" name="salvar" id="input_submit" class="button-enviar"
                   style=" @if($acao == 'visualizar') display: none @endif ">
        </form>
    </main>
@endsection
