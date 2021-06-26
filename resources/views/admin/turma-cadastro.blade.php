@extends('admin.home')

@section('title', 'Cadastro Turma')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-turma') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Turma</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="nome da turma">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Curso</label>
                    <select class="form-select" aria-label="Default select example" name="curso_id">
                        @foreach ($cursos as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Disciplina</label>
                    <select class="form-select" aria-label="Default select example" name="disciplina_id">
                        @foreach ($disciplinas as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Turmas
        </div>
        <div class="lista-formacao">
            @foreach ($turmas as $item)
            <div class="row">
                <div class="col">
                    - {{ $item->nome }}
                </div>
                <div class="col-2">
                    <a href="{{ route('admin.turma-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
