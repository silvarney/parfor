@extends('home')

@section('title', 'Edital')

@section('body_home')

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col-2">Número</th>
        <th scope="col">Título</th>
        <th scope="col">Abertura</th>
        <th scope="col">Término</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($editais as $item)
        <tr>
            <th scope="row"><a href="javascript:void(0);" onclick="select('{{ $item->id }}')">{{ $item->numero }}</a></th>
            <td>{{ $item->titulo }}</td>
            <td>{{ date('d/m/Y', strtotime($item->abertura)) }}</td>
            <td>{{ date('d/m/Y', strtotime($item->termino)) }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editalModal" tabindex="-1" role="dialog" aria-labelledby="editalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editalModalLabel">Edital</h5>
        </div>
        <div class="modal-body">

            <table class="table table-striped" id="table-edital">
                <thead>
                  <tr>
                    <th scope="col">Posição</th>
                    <th scope="col">Pontos</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Disciplina</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-fechar">Fechar</button>
        </div>
      </div>
    </div>
  </div>

    @push('scripts')
        <script>

            function select(id) {
                $('#editalModal').modal('show');

                $.ajax({
                    url : "{{ url('pesquisa-edital') }}/"+id,
                    type : 'GET',
                    success: function(response) {
                        var table = '';
                        response.forEach(function(value){
                            table += '<tr><td>' + value.posicao + '</td>';
                            table += '<td>' + value.pontos + '</td>';
                            table += '<td>' + value.professor_nome + '</td>';
                            table += '<td>' + value.disciplinas_nome + '</td></tr>';
                        });
                        $('#table-edital tbody').html(table);
                    }
                });

            };

            $('#btn-fechar').click(function() {
                $('#editalModal').modal('hide');
            });

        </script>
    @endpush

@stop
