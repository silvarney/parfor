@extends('home')

@section('body_pesquisa')

    <div class="card listFormacoes">
        <div class="card-header">
            Dados - Edital
        </div>
        <div class="lista-formacao">
            @foreach ($alocacoes as $item)
            <div class="row">
                <div class="col">
                    Edital: <b>{{ $item->edital_numero }}</b> - Posição: <b>{{ $item->posicao }}º</b> - Pontos: <b>{{ $item->pontos }}</b> - Professor: <b>{{ $item->professor_nome }}</b> - Disciplina: <b>{{ $item->disciplinas_nome }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br><br>

    <hr>

    <br>

@stop
