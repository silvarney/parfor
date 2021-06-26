<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect('/admin/usuario')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/usuario')->with('delete', 'Usuário desativado com sucesso!');
    }
}
