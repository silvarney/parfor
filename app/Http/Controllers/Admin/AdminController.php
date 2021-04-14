<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('admin/home');
    }

    public function cadastro_campus()
    {
        return view('admin/campus-cadastro');
    }

    public function cadastro_edital()
    {
        return view('admin/edital-cadastro');
    }

    public function cadastro_professor()
    {
        return view('admin/professor-cadastro');
    }

    public function cadastro_curso()
    {
        return view('admin/curso-cadastro');
    }

    public function cadastro_disciplina()
    {
        return view('admin/disciplina-cadastro');
    }

    public function cadastro_alocacao()
    {
        return view('admin/alocacao-cadastro');
    }

    public function cadastro_usuario()
    {
        return view('admin/usuario-cadastro');
    }
}
