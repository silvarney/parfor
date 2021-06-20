@extends('admin.home')

@section('title', 'Cadastro Usuário')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-usuario') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-8">
                    <label for="cadastroUsuarioNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="cadastroUsuarioNome" name="name" placeholder="nome completo">
                </div>
                <div class="col-4">
                    <label for="cadastroUsuarioEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="cadastroUsuarioEmail" name="email" placeholder="seu@email">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroUsuarioSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="cadastroUsuarioSenha" name="password" placeholder="*********">
                </div>
                <div class="col">
                    <label for="cadastroUsuarioRepita" class="form-label">Repita a Senha</label>
                    <input type="password" class="form-control" id="cadastroUsuarioRepita" placeholder="*********">
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Usuários
        </div>
        <div class="lista-formacao">
            @foreach ($users as $item)
            <div class="row">
                <div class="col">
                    {{ $item->nome }} - {{ $item->email }}
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="delet({{ $item->id }})">Excluir</button>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br><br>
@stop
