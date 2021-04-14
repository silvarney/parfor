<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin/home');
});
*/

Route::middleware(['auth'])->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    
    Route::get('/', 'AdminController@index');
    Route::get('/campus/cadastro', 'AdminController@cadastro_campus');
    Route::get('/edital/cadastro', 'AdminController@cadastro_edital');
    Route::get('/professor/cadastro', 'AdminController@cadastro_professor');
    Route::get('/curso/cadastro', 'AdminController@cadastro_curso');
    Route::get('/disciplina/cadastro', 'AdminController@cadastro_disciplina');
    Route::get('/alocacao/cadastro', 'AdminController@cadastro_alocacao');
    Route::get('/usuario/cadastro', 'AdminController@cadastro_usuario');


});

