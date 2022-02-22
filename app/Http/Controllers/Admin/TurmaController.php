<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Curso;
use App\Models\Admin\Disciplina;
use Illuminate\Http\Request;

use App\Models\Admin\Turma;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function index()
    {
        $list_turmas = DB::table('turmas')
                        ->join('cursos', 'turmas.curso_id', 'cursos.id')
                        ->join('disciplinas', 'turmas.disciplina_id', 'disciplinas.id')
                        ->select('turmas.*', 'cursos.nome as curso_nome', 'disciplinas.nome as disciplina_nome')
                        ->where('turmas.status', null)
                        ->get();

        $disciplinas = Disciplina::where('status', null)->get();

        $cursos = Curso::where('status', null)->get();

        return view('admin/turma-cadastro', compact('list_turmas', 'disciplinas', 'cursos'));
    }

    public function edit($id)
    {
        $turma = new Turma();

        $list_turmas = $turma->join('cursos', 'turmas.curso_id', 'cursos.id')
                            ->join('disciplinas', 'turmas.disciplina_id', 'disciplinas.id')
                            ->select('turmas.*', 'cursos.nome as curso_nome', 'disciplinas.nome as disciplina_nome')
                            ->where('turmas.status', null)
                            ->get();

        $turma = $turma->find($id);

        $disciplinas = Disciplina::where('status', null)->get();

        $cursos = Curso::where('status', null)->get();

        return view('admin/turma-cadastro', compact('list_turmas', 'turma', 'disciplinas', 'cursos'));
    }

    public function store(Request $request)
    {

        Turma::create($request->all());

        return redirect('/admin/turma')->with('success', 'Turma cadastrada com sucesso!');

    }

    public function update(Request $request)
    {
        unset($request['_token']);

        Turma::where('id', $request['id'])->update($request->all());

        return redirect('/admin/turma')->with('success', 'Turma alterada com sucesso');

    }

    public function destroy($id)
    {
        Turma::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/turma')->with('delete', 'Turma desativada com sucesso!');
    }
}
