<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Disciplina;

class DisciplinaController extends Controller
{

    public function store(Request $request)
    {

        Disciplina::create($request->all());

        return redirect('/admin/disciplina')->with('success', 'Disciplina cadastrada com sucesso!');

    }

    public function destroy($id)
    {
        Disciplina::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/disciplina')->with('delete', 'Disciplina desativado com sucesso!');

    }

}
