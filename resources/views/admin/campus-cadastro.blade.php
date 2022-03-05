@extends('admin.home')

@section('title', 'Cadastro Campus')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($campus)) action="{{ route('admin.created-campus') }}" @else action="{{ route('admin.update-campus') }}" @endif method="post">
            @csrf

            @if (isset($campus))
                <input type="hidden" name="id" value="{{ $campus->id }}">
            @endif

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome/Cidade</label>
                <select class="form-control" name="nome" id="nome">
                    @foreach ($cidades as $item)
                        @if((isset($campus) ? $campus->nome : old('nome')) === $item)
                            <option value="{{ $item }}" selected>{{ $item }}</option>
                        @else
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <br>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
                <textarea class="form-control" id="cadastroProfessorEndereco" name="endereco" rows="2"  required>{{ isset($campus) ? $campus->endereco : old('endereco')}}</textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="cadastroProfessorBairro" id="bairro" name="bairro" value="{{ isset($campus) ? $campus->bairro : old('bairro')}}"  required>
                </div>
                <div class="col">
                    <label for="cadastroProfessorCep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cadastroProfessorCep" data-mask="00000-000" name="cep" value="{{ isset($campus) ? $campus->cep : old('cep')}}" required>
                </div>
                <div class="col">
                    <label for="cadastroProfessorUf" class="form-label">UF</label>
                    <select class="form-control" aria-label="Default select example" name="uf">
                        <option value="PA">PA</option>
                    </select>
                </div>
            </div>

            <br>

            @if (isset($campus))
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>
            @else
                <button type="submit" class="btn btn-success">Salvar</button>
            @endif

        </form>
    </div>

    <!--lista de campus-->
    <div class="card listFormacoes">
        <div class="card-header">
            Lista - Campus
        </div>
        <div class="lista-formacao">
            @foreach ($list_campus as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.campus.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.campus-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Campus: <b>{{ $item->nome }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.

@stop
