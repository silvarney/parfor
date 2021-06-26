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
                    {{ $item->edital_numero }} - {{ $item->disciplinas_nome }} - {{ $item->professor_nome }} - {{ $item->pontos }}
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br><br>

    <hr>

    <br>

@stop
