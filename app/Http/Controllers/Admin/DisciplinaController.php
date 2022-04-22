<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RestoreModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Disciplina;

class DisciplinaController extends Controller
{
    public function index()
    {
        $list_disciplinas = Disciplina::where('status', null)->get();

        return view('admin/disciplina-cadastro', compact('list_disciplinas'));
    }

    public function edit($id)
    {
        $disciplina = new Disciplina();
        $list_disciplinas = $disciplina->where('status', null)->get();
        $disciplina = $disciplina->find($id);

        return view('admin/disciplina-cadastro', compact('list_disciplinas','disciplina'));
    }

    public function store(Request $request, Disciplina $disciplina)
    {
        if (RestoreModel::restore($disciplina, 'nome', $request->nome)) {
            return redirect('/admin/disciplina')->with('success', 'Item restaurado com sucesso');
        } else {
            Disciplina::create($request->all());
            return redirect('/admin/disciplina')->with('success', 'Item cadastrada com sucesso!');
        }
    }

    public function update(Request $request)
    {
        unset($request['_token']);

        Disciplina::where('id', $request['id'])->update($request->all());

        return redirect('/admin/disciplina')->with('success', 'Disciplina alterada com sucesso');

    }
}
