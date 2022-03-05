@extends('admin.home')

@section('title', 'Cadastro Turma')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($turma)) action="{{ route('admin.created-turma') }}" @else action="{{ route('admin.update-turma') }}" @endif method="post">
            @csrf

            @if (isset($turma))
                <input type="hidden" name="id" value="{{ $turma->id }}">
            @endif

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Turma</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ isset($turma) ? $turma->nome : old('nome')}}" placeholder="nome da turma">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Curso</label>
                    <select class="form-control" aria-label="Default select example" name="curso_id">
                        @foreach ($cursos as $item)
                            @if((isset($turma) ? $turma->curso_id : old('curso_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Disciplina</label>
                    <select class="form-control" aria-label="Default select example" name="disciplina_id">
                        @foreach ($disciplinas as $item)
                            @if((isset($turma) ? $turma->disciplina_id : old('disciplina_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            @if (isset($turma))
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
            Turmas
        </div>
        <div class="lista-formacao">
            @foreach ($list_turmas as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.turma.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.turma-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Turma: <b>{{ $item->nome }}</b> - Curso: <b>{{ $item->curso_nome }}</b> - Disciplina: <b>{{ $item->disciplina_nome }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
