@extends('admin.home')

@section('title', 'Cadastro Curso')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-curso') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Curso</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="nome do curso">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Carga Horária</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="carga_horaria">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Início</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="inicio">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Término</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="termino">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Campus</label>
                    <select class="form-select" aria-label="Default select example" name="campus_id">
                        @foreach ($campus as $item)
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
            Curso
        </div>
        <div class="lista-formacao">
            @foreach ($curso as $item)
            <div class="row">
                <div class="col">
                    - {{ $item->nome }}
                </div>
                <div class="col-2">
                    <a href="{{ route('admin.curso-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
