<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

/*
Route::get('/', function () {
    return view('home');
});
*/
Route::get('/', 'App\Http\Controllers\PublicoController@index')->name('index');
Route::post('/pesquisa-edital', 'App\Http\Controllers\PublicoController@pesquisa')->name('pesquisa-edital');

Route::middleware(['auth'])->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    //views
    Route::get('/', 'AdminController@index');
    Route::get('/campus', 'AdminController@cadastro_campus')->name('admin.campus');
    Route::get('/edital', 'AdminController@cadastro_edital')->name('admin.edital');
    Route::get('/professor', 'AdminController@cadastro_professor')->name('admin.professor');
    Route::get('/curso', 'AdminController@cadastro_curso')->name('admin.curso');
    Route::get('/curso/del/{id}', 'CursoController@destroy')->name('admin.curso-del');
    Route::get('/disciplina', 'AdminController@cadastro_disciplina')->name('admin.disciplina');
    Route::get('/turma', 'AdminController@cadastro_turma')->name('admin.turma');
    Route::get('/alocacao', 'AdminController@cadastro_alocacao')->name('admin.alocacao');
    Route::get('/usuario', 'AdminController@cadastro_usuario')->name('admin.usuario');
    Route::get('/formacao/show/{id}', 'FormacaoController@show')->name('admin.formacao-lista');
    Route::get('/formacao/del/{id}', 'FormacaoController@destroy')->name('admin.formacao-del');

    //frag
    Route::get('/professor/form-professor/{id}', 'ProfessorController@formProfessor')->name('admin.formacao-professor');


    //inserts
    Route::post('/campus/created', 'CampusController@store')->name('admin.created-campus');
    Route::post('/edital/created', 'EditalController@store')->name('admin.created-edital');
    Route::post('/professor/created', 'ProfessorController@store')->name('admin.created-professor');
    Route::post('/formacao/created', 'FormacaoController@store')->name('admin.created-formacao');
    Route::post('/curso/created', 'CursoController@store')->name('admin.created-curso');
    Route::post('/disciplina/created', 'DisciplinaController@store')->name('admin.created-disciplina');
    Route::post('/turma/created', 'TurmaController@store')->name('admin.created-turma');
    Route::post('/alocacao/created', 'AlocacaoController@store')->name('admin.created-alocacao');
    Route::post('/usuario/created', 'UsuarioController@store')->name('admin.created-usuario');

    //update
    Route::post('/professor/update', 'ProfessorController@update')->name('admin.update-professor');

    //delete
    Route::get('/campus/del/{id}', 'CampusController@destroy')->name('admin.campus-del');
    Route::get('/edital/del/{id}', 'EditalController@destroy')->name('admin.edital-del');
    Route::get('/curso/del/{id}', 'CursoController@destroy')->name('admin.curso-del');
    Route::get('/disciplina/del/{id}', 'DisciplinaController@destroy')->name('admin.disciplina-del');
    Route::get('/turma/del/{id}', 'TurmaController@destroy')->name('admin.turma-del');
    Route::get('/alocacao/del/{id}', 'AlocacaoController@destroy')->name('admin.alocacao-del');
    Route::get('/usuario/del/{id}', 'UsuarioController@destroy')->name('admin.usuario-del');
});

