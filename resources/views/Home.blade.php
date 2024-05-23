@extends('layout.Layout')

@section('titulo', 'Página Inicial')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/table.css"/>
    <link rel="stylesheet" type="text/css" href="/css/home.css"/>
@endsection

@section('conteudo')
    <main>
        <section>
            <h1>Dados sobre Processos e Honorários</h1>
            <table>
                <thead>
                <tr>
                    <th>Total de Processos</th>
                    <th>Total de Honorários</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $totalProcessos }}</td>
                    <td>{{ $totalHonorarios }}</td>
                </tr>
                </tbody>
            </table>
        </section>

        <section>
            <h1>Processos do dia</h1>
            <table>
                <thead>
                    <tr>
                        <th>Número do processo</th>
                        <th>Cliente</th>
                        <th>Próximo prazo</th>
                        <th colspan="1">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @if($processosDia->isEmpty())
                        <tr>
                            <td colspan="5">Nenhum processo encontrado para hoje.</td>
                        </tr>
                    @else
                        @foreach($processosDia as $processo)
                            <tr>
                                <td>{{ $processo->numeroprocesso }}</td>
                                <td>{{ $processo->cliente }}</td>
                                <td>{{ $processo->proximoprazo }}</td>
                                <td><a href="/processo/visualizar/{{ $processo->numeroprocesso }}"><img src="/images/icons/visibility_icon.png" alt="Ícone Visualizar"></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </main>
@endsection
