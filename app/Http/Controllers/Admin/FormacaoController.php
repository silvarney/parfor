<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Formacao;

class FormacaoController extends Controller
{
    public function store(Request $request)
    {
        unset($request['_token']);

        Formacao::create($request->all());

        $result['success'] = true;
        $result['message'] = 'Formação inserida com sucesso';
        echo json_encode($result);

    }

    public function show($id)
    {

        $formacoes = Formacao::where('professor_id', $id)->get();

        echo json_encode($formacoes);

    }

    public function destroy($id)
    {

        Formacao::where('id', $id)->delete();

        $result['success'] = true;
        $result['message'] = 'Formação excluída com sucesso';

        echo json_encode($result);

    }
}
