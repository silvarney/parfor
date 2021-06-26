@extends('admin.home')

@section('title', 'Cadastro Campus')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-campus') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="nome">
            </div>

            <br>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
                <textarea class="form-control" id="cadastroProfessorEndereco" name="endereco" rows="2"></textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="cadastroProfessorBairro" name="bairro">
                </div>
                <div class="col">
                    <label for="cadastroProfessorCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cadastroProfessorCidade" name="cidade">
                </div>
                <div class="col">
                    <label for="cadastroProfessorCep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cadastroProfessorCep" name="cep">
                </div>
                <div class="col">
                    <label for="cadastroProfessorUf" class="form-label">UF</label>
                    <select class="form-select" aria-label="Default select example" name="uf">
                        <option value="PA">PA</option>
                    </select>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de campus-->
    <div class="card listFormacoes">
        <div class="card-header">
            Campus
        </div>
        <div class="lista-formacao">
            @foreach ($campus as $item)
            <div class="row">
                <div class="col">
                    {{ $item->nome }} - {{ $item->cep }}
                </div>
                <div class="col-2">
                    <a href="{{ route('admin.campus-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
