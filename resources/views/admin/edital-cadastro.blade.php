@extends('admin.home')

@section('title', 'Cadastro Edital')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($edital)) action="{{route('admin.created-edital')}}" @else action="{{ route('admin.update-edital') }}" @endif method="post">
            @csrf

            @if (isset($edital))
                <input type="hidden" name="id" value="{{ $edital->id }}">
            @endif

            <div class="row">
                <div class="col">
                    <label for="cadastroEditalNumero" class="form-label">Edital</label>
                    <input type="text" class="form-control" id="cadastroEditalNumero" name="numero" value="{{ isset($edital) ? $edital->numero : old('numero')}}" placeholder="número">
                </div>
                <div class="col">
                    <label for="cadastroEditalTitulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="cadastroEditalTitulo" name="titulo" value="{{ isset($edital) ? $edital->titulo : old('titulo')}}" placeholder="título">
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroEditalAbertura" class="form-label">Abertura</label>
                    <input type="date" class="form-control" id="cadastroEditalAbertura" name="abertura" value="{{ isset($edital) ? $edital->abertura : old('abertura')}}">
                </div>
                <div class="col">
                    <label for="cadastroEditalTermino" class="form-label">Término</label>
                    <input type="date" class="form-control" id="cadastroEditalTermino" name="termino" value="{{ isset($edital) ? $edital->termino : old('termino')}}">
                </div>
            </div>

            <br>

            @if (isset($edital))
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>
            @else
                <button type="submit" class="btn btn-success">Salvar</button>
            @endif
        </form>
    </div>

    <!--lista de formacoes do edital-->
    <div class="card listFormacoes">
        <div class="card-header">
            Editais
        </div>
        <div class="lista-formacao">
            @foreach ($editais as $item)
            <div class="row">
                <div class="col list-btn">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/admin/edital/relatorio/{{$item->id}}" target='_blank' class='btn btn-outline-success btn-sm'>Relatório</a>
                        <a href="{{ route('admin.edital.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.delete', ['id' => $item->id, 'table' => 'editais']) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Número: <b>{{ $item->numero }}</b> - Título: <b>{{ $item->titulo }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
