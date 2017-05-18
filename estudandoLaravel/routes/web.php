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

Route::get('/user', 'LoginController@login');

Route::get('/user/cadastro', 'UserController@cadastro');

Route::post('/user/inserir', 'UserController@inserirUser');

Route::post('/user/logar', 'UserController@logar');

Route::get('/user/logout', 'UserController@logout');

Route::get('/pedido/lista', 'PedidoController@lista');

Route::get('/carrinho/{id}', 'PedidoController@carrinho');

Route::get('/carrinho', 'PedidoController@index');

Route::get('/carrinho/remover/{id}', 'PedidoController@excluir');

Route::get('/pedido', 'PedidoController@listar');

Route::get('/pedido/finalizar', 'PedidoController@finalizar');
