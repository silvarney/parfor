@extends('admin.home')

@section('title', 'Cadastro Curso')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($curso)) action="{{route('admin.created-curso')}}" @else action="{{ route('admin.update-curso') }}" @endif method="post">
            @csrf

            @if (isset($curso))
                <input type="hidden" name="id" value="{{ $curso->id }}">
            @endif

            <div class="row">
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Campus</label>
                    <select class="form-select" aria-label="Default select example" name="campus_id">
                        @foreach ($campus as $item)
                            @if((isset($curso) ? $curso->campus_id : old('campus_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Curso</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ isset($curso) ? $curso->nome : old('nome')}}" placeholder="nome do curso">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Início</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="inicio" value="{{ isset($curso) ? $curso->inicio : old('inicio')}}">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Término</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="termino" value="{{ isset($curso) ? $curso->termino : old('terminio')}}">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Carga Horária</label>
                    <input type="number" min="0" class="form-control" id="exampleFormControlInput1" name="carga_horaria" value="{{ isset($curso) ? $curso->carga_horaria : old('carga_horaria')}}">
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Curso
        </div>
        <div class="lista-formacao">
            @foreach ($list_curso as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.curso.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="{{ route('admin.curso-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                    </div>
                    Campus: <b>{{ $item->campus_nome }}</b> - Curso: <b>{{ $item->nome }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
