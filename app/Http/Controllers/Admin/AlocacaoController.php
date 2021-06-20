<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Alocacao;

class AlocacaoController extends Controller
{
    public function store(Request $request)
    {
        Alocacao::create($request->all());

        return redirect('/admin/alocacao')->with('success', 'Alocação realizada com sucesso');
    }
}
