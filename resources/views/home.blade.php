<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfor - UFRA</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icone.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/parfor.css') }}">
</head>
<body>

    <div class="col-4 align-middle" >
        <img class="ima-logo" src="{{ asset('img/parfor.png') }}">
    </div>

    <p class="txt_ufra fw-normal">Parfor - UNIVERSIDADE FEDERAL RURAL DA AMAZÔNIA</p>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="shadow p-3 mb-5 bg-body rounded pesquisaEdital">
                    <form name="formPesquisa" action="{{ route('pesquisa-edital') }}" method="post">
                        @csrf
                        <div class="row g-3 align-items-center">
                            <div class="col-10">
                                <select class="form-select" aria-label="Default select example" name="id">
                                    @foreach ($editais as $item)
                                        <option value="{{ $item->id }}">{{ $item->numero }} - {{ $item->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success">Pesquisar</button>
                                <button class="btn btn-primary" type="button" onclick="location.href ='{{ route('login') }}'" >Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!--pesquisa edital-->
                @hasSection('body_pesquisa')
                    @yield('body_pesquisa')
                @endif

                <p align="justify" style="font-size:18px">
                    <b>O que é o PARFOR</b>
                    <br>O que é o PARFOR – Plano Nacional de Formação de Professores da Educação Básica
                    <br>
                    <br>O Parfor, na modalidade presencial é um Programa emergencial instituído para atender o disposto no artigo 11, inciso III do Decreto nº 6.755, de 29 de janeiro de 2009 e implantado em regime de colaboração entre a Capes, os estados, municípios o Distrito Federal e as Instituições de Educação Superior – IES.
                    <br>
                    <br>O Programa fomenta a oferta de turmas especiais em cursos de:
                    <br>
                    <br>I. Licenciatura – para docentes ou tradutores intérpretes de Libras em exercício na rede pública da educação básica que não tenham formação superior ou que mesmo tendo essa formação se disponham a realizar curso de licenciatura na etapa/disciplina em que atua em sala de aula;
                    <br>II. Segunda licenciatura – para professores licenciados que estejam em exercício há pelo menos três anos na rede pública de educação básica e que atuem em área distinta da sua formação inicial, ou para profissionais licenciados que atuam como tradutor intérprete de Libras na rede pública de Educação Básica; e
                    <br>III. Formação pedagógica – para docentes ou tradutores intérpretes de Libras graduados não licenciados que se encontram no exercício da docência na rede pública da educação básica.
                    <br>
                    <br>Objetivo:
                    <br>
                    <br>Induzir e fomentar a oferta de educação superior, gratuita e de qualidade, para professores em exercício na rede pública de educação básica, para que estes profissionais possam obter a formação exigida pela Lei de Diretrizes e Bases da Educação Nacional – LDB e contribuam para a melhoria da qualidade da educação básica no País.
                    <br>
                    <br>Como funciona?
                    <br>
                    <br>Anualmente a Capes divulga o Calendário de Atividades do Programa. Nele estão definidos os prazos e as atividades a serem realizadas pelas secretarias de educação estaduais, Municipais e do DF, os Fóruns e as IES e o período das pré-inscrições.
                    <br>
                    <br>Para concorrer à vaga nos cursos ofertados, os professores devem: <br>a) realizar seu cadastro e pré- inscrição na Plataforma Freire; <br>b) estar cadastrado no Educacenso na função Docente ou Tradutor Intérprete de Libras na rede pública de educação básica; <br>e c) ter sua pré-inscrição validada pela Secretaria de educação ou órgão equivalente a que estiver vinculado.
                    <br><br>
                </p>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script>
    $(document).ready(function(){
        $('.pesquisaEdital').css("display", "none");

        $(".bt-pesquisa").on('click', function () {
            $('.pesquisaEdital').css("display", "block");
        });

    });
    </script>
</body>
</html>
