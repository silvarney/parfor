@extends('admin.home')

@section('title', 'Cadastro Usuário')

@section('body_page')

    @if(\Auth::user()->type === "Admin" || isset($usuario))
        <div class="shadow p-3 mb-5 bg-body rounded">
            <form @if(!isset($usuario)) action="{{ route('admin.created-usuario') }}" @else action="{{ route('admin.update-usuario') }}" @endif method="post">
                @csrf

                @if (isset($usuario))
                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                @endif

                <div class="row">
                    <div class="col-8">
                        <label for="cadastroUsuarioNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="cadastroUsuarioNome" name="name" value="{{ isset($usuario) ? $usuario->name : old('name')}}" placeholder="nome completo">
                    </div>
                    <div class="col-4">
                        <label for="cadastroUsuarioEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="cadastroUsuarioEmail" name="email" value="{{ isset($usuario) ? $usuario->email : old('email')}}" placeholder="seu@email">
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
                    <div class="col">
                        <label for="cadastroUsuarioTipo" class="form-label">Tipo</label>
                        <select class="form-control" aria-label="Default select example" name="type">
                            <option @if(isset($usuario) && $usuario->type === "User") value="{{ $usuario->type }}" selected> {{ $usuario->type }} @else value="User"> User  @endif</option>
                            <option @if(isset($usuario) && $usuario->type === "Admin") value="{{ $usuario->type }}" selected> {{ $usuario->type }} @else value="Admin"> Admin  @endif</option>
                        </select>
                    </div>
                </div>

                <br>

                @if (isset($usuario))
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>
                @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                @endif
            </form>
        </div>
    @endif

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Usuários
        </div>
        <div class="lista-formacao">
            @foreach ($list_users as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.usuario.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.delete', ['id' => $item->id, 'table' => 'users']) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Tipo: <b>{{ $item->type }}</b> - Nome: <b>{{ $item->name }}</b> - Email: <b>{{ $item->email }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br><br>
@stop
