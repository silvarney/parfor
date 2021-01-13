@extends('admin.home')

@section('title', 'Cadastro Edital')

@section('body_page')

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Edital</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="número">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Abertura</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Início - Inscrição</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Término - Inscrição</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop