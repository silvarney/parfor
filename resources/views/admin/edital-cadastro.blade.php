@extends('admin.home')

@section('title', 'Cadastro Edital')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-edital') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="cadastroEditalNumero" class="form-label">Edital</label>
                    <input type="text" class="form-control" id="cadastroEditalNumero" name="numero" placeholder="número">
                </div>
                <div class="col">
                    <label for="cadastroEditalTitulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="cadastroEditalTitulo" name="titulo" placeholder="título">
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroEditalAbertura" class="form-label">Abertura</label>
                    <input type="date" class="form-control" id="cadastroEditalAbertura" name="abertura">
                </div>
                <div class="col">
                    <label for="cadastroEditalTermino" class="form-label">Término</label>
                    <input type="date" class="form-control" id="cadastroEditalTermino" name="termino">
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Editais
        </div>
        <div class="lista-formacao">
            @foreach ($editais as $item)
            <div class="row">
                <div class="col">
                    {{ $item->numero }} - {{ $item->titulo }}
                </div>
                <div class="col-2">
                    <a href="{{ route('admin.edital-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
