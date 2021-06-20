<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\Edital;
use App\Models\Admin\Campus;
use App\Models\Admin\Curso;
use App\Models\Admin\Disciplina;
use App\Models\Admin\Turma;
use App\Models\Admin\Professor;
use App\Models\Admin\Alocacao;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('admin/home');
    }

    public function cadastro_campus()
    {
        $campus = Campus::all();

        return view('admin/campus-cadastro', compact('campus'));
    }

    public function cadastro_edital()
    {
        $editais = Edital::all();

        return view('admin/edital-cadastro', compact('editais'));
    }

    public function cadastro_professor()
    {
        $campus = Campus::all();

        session(['campus' => $campus]);

        return view('admin/professor-cadastro');
    }

    public function cadastro_curso()
    {
        $campus = Campus::all();

        $curso = Curso::all();

        return view('admin/curso-cadastro', compact('campus', 'curso'));
    }

    public function cadastro_disciplina()
    {
        $disciplinas = Disciplina::all();

        return view('admin/disciplina-cadastro', compact('disciplinas'));
    }

    public function cadastro_turma()
    {
        $turmas = Turma::all();

        $disciplinas = Disciplina::all();

        $cursos = Curso::all();

        return view('admin/turma-cadastro', compact('turmas', 'disciplinas', 'cursos'));
    }

    public function cadastro_alocacao()
    {
        $editais = Edital::all();

        $professores = Professor::orderBy('nome')->get();

        $disciplinas = Disciplina::orderBy('nome')->get();

        $alocacoes = DB::table('disciplina_professores')
                ->join('editais', function ($join) {
                    $join->on('disciplina_professores.edital_id', '=', 'editais.id');
                })
                ->join('professores', function ($join) {
                    $join->on('disciplina_professores.professor_id', '=', 'professores.id');
                })
                ->join('disciplinas', function ($join) {
                    $join->on('disciplina_professores.disciplina_id', '=', 'disciplinas.id');
                })
                ->select('disciplina_professores.id', 'editais.numero as edital_numero', 'professores.nome as professor_nome', 'disciplinas.nome as disciplinas_nome')
                ->get();

        return view('admin/alocacao-cadastro', compact('alocacoes', 'editais', 'professores', 'disciplinas'));
    }

    public function cadastro_usuario()
    {
        $users = User::all();

        return view('admin/usuario-cadastro', compact('users'));
    }
}
