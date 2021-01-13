@extends('admin.home')

@section('title', 'Cadastro Usuário')

@section('body_page')

    <div class="row">
        <div class="col-8">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome completo">
        </div>
        <div class="col-4">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="seu@email">
        </div>
    </div>

    <br>

    <div class="row">        
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Senha</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="*********">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Repita a Senha</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="*********">
        </div>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop