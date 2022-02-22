<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório - Professor</title>

    <style>
        html{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        hr {
            border: 1px solid green;
        }

        fieldset {
            border: 0px;
        }

        .header {
            text-align: center;
        }

        .title {
            font-size: 18px;
            margin-bottom : 0px;
        }

        .descripton {
            font-size: 14px;
            margin: 0px;
        }

        .content {
            margin-left: 5%;
            margin-right: 5%;
        }

        .img-brasao{
            width: 100px;
        }

    </style>
</head>
<body>
    <fieldset>

        <div class="header">
            <img class="img-brasao" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/brasao_ufra.png'))) }}">
            <p class="title"><strong>Universidade Federal Rural da Amazônia</strong></p>
            <p class="descripton"><strong>Parfor - Plano Nacional de Formação de Professores da Educação Básica</strong></p>
        </div>

    </fieldset>

    <div class="content">
        <p>PROFESSOR</p>
        <hr>
        <p>Nome: <strong>{{ $professor->nome }}</strong> &nbsp; Sexo: <strong>{{ $professor->sexo }}</strong> &nbsp; CPF: <strong>{{ $professor->cpf }}</strong></p>
        <p>Nascimento: <strong>{{ $professor->nascimento }}</strong> &nbsp; RG: <strong>{{ $professor->rg }}</strong> &nbsp; Data de emissão: <strong>{{ $professor->emissao }}</strong> </p>
        <p>Nacionalidade: <strong>{{ $professor->nacionalidade }}</strong> &nbsp; Naturalidade: <strong>{{ $professor->naturalidade }}</strong></p>
        <p>Telefone: <strong>{{ $professor->telefone }}</strong> &nbsp; Email: <strong>{{ $professor->email }}</strong> &nbsp; Portador de necessidade: <strong>{{ $professor->portador_necessidade }}</strong></p>
        <p>Endereço: <strong>{{ $professor->endereco }}</strong></p>
        <p>Bairro: <strong>{{ $professor->bairro }}</strong> &nbsp; Cidade: <strong>{{ $professor->cidade }}</strong> &nbsp; CEP: <strong>{{ $professor->cep }}</strong> &nbsp; UF: <strong>{{ $professor->uf }}</strong></p>

        <br>
        <p>FORMAÇÃO</p>
        <hr>
        @foreach ($formacoes as $item)
            <p>Graduação: <strong>{{ $item->graduacao }}</strong></p>
            <p>Instituição: <strong>{{ $item->instituicao }}</strong></p>
            <p>País: <strong>{{ $item->pais }}</strong> &nbsp; Cidade: <strong>{{ $item->cidade }}</strong> &nbsp; UF: <strong>{{ $item->uf }}</strong></p>
        @endforeach

        <br>
        <p>EDITAL</p>
        <hr>
        @foreach ($editais as $item)
            <p>Número: <strong>{{ $item->numero }}</strong> &nbsp; Título: <strong>{{ $item->titulo }}</strong></p>
            <p>Pontos: <strong>{{ $item->pontos }}</strong> &nbsp; Abertura: <strong>{{ $item->abertura }}</strong> &nbsp; Término: <strong>{{ $item->termino }}</strong></p>
        @endforeach


        <br>
        <p>TURMA</p>
        <hr>
        @foreach ($turmas as $item)
        <p>Nome: <strong>{{ $item->nome }}</strong></p>
        @endforeach

        <br>
        <p>CURSO</p>
        <hr>
        @foreach ($cursos as $item)
            <p>Nome: <strong>{{ $item->nome }}</strong></p>
            <p>Período - Início: <strong>{{ $item->inicio }}</strong> &nbsp; Período - Término: <strong>{{ $item->inicio }}</strong> &nbsp; Carga Horária: <strong>{{ $item->carga_horaria }}</strong></p>
        @endforeach

        <br>
        <p>DISCIPLINA</p>
        <hr>
        @foreach ($disciplinas as $item)
            <p>Disciplina: <strong>{{ $item->nome }}</strong> &nbsp; Carga Horária: <strong>{{ $item->carga_horaria }}</strong></p>
            <p>Período - Início: <strong>{{ $item->periodo_inicio }}</strong> &nbsp; Período - Término: <strong>{{ $item->periodo_termino }}</strong></p>
        @endforeach



    </div>

    <div class="footer">

    </div>
</body>
</html>
