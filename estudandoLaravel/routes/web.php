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
Route::get('/', 'CategoriaController@home');

Route::get('/categoria/lista', 'CategoriaController@lista');

Route::get('/categoria/{id}', 'CategoriaController@filtroPorCategoria');

Route::get('/login', 'LoginController@login');

Route::post('/login/logar', 'LoginController@logar');

Route::get('/login/logout', 'LoginController@logout');

Route::get('/pedido/lista', 'PedidoController@lista');

Route::get('/carrinho/{id}', 'PedidoController@carrinho');

Route::get('/carrinho', 'PedidoController@index');

Route::get('/carrinho/remover/{id}', 'PedidoController@excluir');
