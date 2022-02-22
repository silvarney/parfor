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
    Route::get('/campus', 'CampusController@index')->name('admin.campus');
    Route::get('/campus/edit/{id}', 'CampusController@edit')->name('admin.campus.edit');
    Route::get('/edital', 'EditalController@index')->name('admin.edital');
    Route::get('/edital/edit/{id}', 'EditalController@edit')->name('admin.edital.edit');
    Route::get('/professor', 'ProfessorController@index')->name('admin.professor');
    Route::get('/professor/edit/{id}', 'ProfessorController@edit')->name('admin.professor.edit');
    Route::get('/curso', 'CursoController@index')->name('admin.curso');
    Route::get('/curso/edit/{id}', 'CursoController@edit')->name('admin.curso.edit');
    Route::get('/disciplina', 'DisciplinaController@index')->name('admin.disciplina');
    Route::get('/disciplina/edit/{id}', 'DisciplinaController@edit')->name('admin.disciplina.edit');
    Route::get('/turma', 'TurmaController@index')->name('admin.turma');
    Route::get('/turma/edit/{id}', 'TurmaController@edit')->name('admin.turma.edit');
    Route::get('/alocacao', 'AlocacaoController@index')->name('admin.alocacao');
    Route::get('/alocacao/edit/{id}', 'AlocacaoController@edit')->name('admin.alocacao.edit');
    Route::get('/usuario', 'UsuarioController@index')->name('admin.usuario');
    Route::get('/usuario/edit/{id}', 'UsuarioController@edit')->name('admin.usuario.edit');

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
    Route::post('/campus/update', 'CampusController@update')->name('admin.update-campus');
    Route::post('/edital/update', 'EditalController@update')->name('admin.update-edital');
    Route::post('/professor/update', 'ProfessorController@update')->name('admin.update-professor');
    Route::post('/curso/update', 'CursoController@update')->name('admin.update-curso');
    Route::post('/disciplina/update', 'DisciplinaController@update')->name('admin.update-disciplina');
    Route::post('/turma/update', 'TurmaController@update')->name('admin.update-turma');
    Route::post('/alocacao/update', 'AlocacaoController@update')->name('admin.update-alocacao');
    Route::post('/formacao/update', 'FormacaoController@update')->name('admin.update-formacao');
    Route::post('/usuario/update', 'UsuarioController@update')->name('admin.update-usuario');

    //delete
    Route::get('/campus/del/{id}', 'CampusController@destroy')->name('admin.campus-del');
    Route::get('/edital/del/{id}', 'EditalController@destroy')->name('admin.edital-del');
    Route::get('/professor/del/{id}', 'ProfessorController@destroy')->name('admin.professor-del');
    Route::get('/curso/del/{id}', 'CursoController@destroy')->name('admin.curso-del');
    Route::get('/disciplina/del/{id}', 'DisciplinaController@destroy')->name('admin.disciplina-del');
    Route::get('/turma/del/{id}', 'TurmaController@destroy')->name('admin.turma-del');
    Route::get('/alocacao/del/{id}', 'AlocacaoController@destroy')->name('admin.alocacao-del');
    Route::get('/usuario/del/{id}', 'UsuarioController@destroy')->name('admin.usuario-del');
    Route::get('/formacao/del/{id}', 'FormacaoController@destroy')->name('admin.formacao-del');

    //relatorio
    Route::get('/edital/relatorio/{id}', 'RelatorioController@relatorioEdital')->name('admin.relatorio.edital');
    Route::get('/professor/relatorio/{id}', 'RelatorioController@relatorioProfessor')->name('admin.relatorio.professor');

    ////funcoes javascript
    Route::get('/professor/get-professores', 'ProfessorController@getProfessores')->name('admin.get.professores');
    Route::get('/formacao/get-formacao/{id}', 'FormacaoController@getFormacao')->name('admin.get.formacao');
    Route::get('/formacao/get-formacao-all/{id}', 'FormacaoController@getFormacaoAll')->name('admin.formacao-lista');

});

