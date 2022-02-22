<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $list_users = User::where('status', null)->get();

        return view('admin/usuario-cadastro', compact('list_users'));
    }

    public function edit($id)
    {
        $user = new User();
        $list_users = $user->where('status', null)->get();
        $usuario = $user->find($id);

        return view('admin/usuario-cadastro', compact('list_users', 'usuario'));
    }

    public function store(Request $request)
    {

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect('/admin/usuario')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function update(Request $request)
    {
        unset($request['_token']);

        if (empty($request['password'])) {
            unset($request['password']);
        }

        User::where('id', $request['id'])->update($request->all());

        return redirect('/admin/usuario')->with('success', 'Usuário alterada com sucesso');

    }

    public function destroy($id)
    {
        User::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/usuario')->with('delete', 'Usuário desativado com sucesso!');
    }
}
