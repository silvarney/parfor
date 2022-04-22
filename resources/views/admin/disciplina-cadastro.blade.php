@extends('admin.home')

@section('title', 'Cadastro Disciplina')

@section('body_page')
    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($disciplina)) action="{{ route('admin.created-disciplina') }}" @else action="{{ route('admin.update-disciplina') }}" @endif method="post">
            @csrf

            @if (isset($disciplina))
                <input type="hidden" name="id" value="{{ $disciplina->id }}">
            @endif
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Disciplina</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ isset($disciplina) ? $disciplina->nome : old('nome')}}" placeholder="nome da disciplina">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Carga Horária</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="carga_horaria" value="{{ isset($disciplina) ? $disciplina->carga_horaria : old('carga_horaria')}}">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Início</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="periodo_inicio" value="{{ isset($disciplina) ? $disciplina->periodo_inicio : old('periodo_inicio')}}">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Término</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="periodo_termino" value="{{ isset($disciplina) ? $disciplina->periodo_termino : old('periodo_termino')}}">
                </div>
            </div>

            <br>

            @if (isset($disciplina))
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>
            @else
                <button type="submit" class="btn btn-success">Salvar</button>
            @endif
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Lista Disciplinas
        </div>
        <div class="lista-formacao">
            @foreach ($list_disciplinas as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.disciplina.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.delete', ['id' => $item->id, 'table' => 'disciplinas']) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Disciplina: <b>{{ $item->nome }}</b> - Carga Horária: <b>{{ $item->carga_horaria }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
