<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Turma;

class TurmaController extends Controller
{
    public function store(Request $request)
    {

        Turma::create($request->all());

        return redirect('/admin/turma')->with('success', 'Turma cadastrada com sucesso!');

    }
}
