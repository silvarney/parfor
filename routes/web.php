<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin/home');
});

Route::get('/admin/campus-cadastro', function () {
    return view('admin/campus-cadastro');
});

Route::get('/admin/edital-cadastro', function () {
    return view('admin/edital-cadastro');
});

Route::get('/admin/professor-cadastro', function () {
    return view('admin/professor-cadastro');
});

Route::get('/admin/curso-cadastro', function () {
    return view('admin/curso-cadastro');
});

Route::get('/admin/disciplina-cadastro', function () {
    return view('admin/disciplina-cadastro');
});

Route::get('/admin/alocacao-cadastro', function () {
    return view('admin/alocacao-cadastro');
});

Route::get('/admin/usuario-cadastro', function () {
    return view('admin/usuario-cadastro');
});
