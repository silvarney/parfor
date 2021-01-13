@extends('admin.home')

@section('title', 'Cadastro Professor')

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
        <div class="col-4">
            <label for="exampleFormControlInput1" class="form-label">CPF</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="000.000.000-00">
        </div>
        <div class="col">
            <label for="exampleDataList" class="form-label">Campus</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione um Campus...">
            <datalist id="datalistOptions">
                <option value="San Francisco">
                <option value="New York">
                <option value="Seattle">
                <option value="Los Angeles">
                <option value="Chicago">
            </datalist>
        </div>
    </div>

    <br>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop