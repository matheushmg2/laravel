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
    return view('welcome');
});

Route::resource('/produtos', 'ProdutosController');

Route::resource('/employee', 'EmployeeController');

Route::resource('/student', 'StudentController');

Route::resource('/testedb', 'TesteDBController');

Route::resource('/estudantes', 'EstudantesController');
//Route::get('/estudantes', 'EstudantesController@index');
Route::post('/estudantesCadastro', 'EstudantesController@store');
Route::put('/estudantesUpdate/{id}', 'EstudantesController@update');
Route::delete('/estudantesDelete/{id}', 'EstudantesController@destroy');

/*
Route::resource('/estudantes', 'EstudantesController');
Route::resource('/estudantesCadastro', 'EstudantesController@store');
*/
