<?php

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

/*
Route::get('/campanhas', function () {
    return view('campanhas');
});

Route::get('/cadastro-instituicao', function () {
    return view('cadastro-instituicao');
});*/

Route::get('/cadastro-campanhas', 'CadastroCampanhaController@show');

Route::get('/campanhas', 'CampanhaController@show');

Route::post('/campanhas/save', 'CampanhaController@store');