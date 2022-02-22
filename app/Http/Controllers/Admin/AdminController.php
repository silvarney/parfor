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
    public function index()
    {
        return view('admin/home');
    }
}
