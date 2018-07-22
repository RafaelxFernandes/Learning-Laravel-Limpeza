<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*CategoriaController*/
Route::post('/criarCategoria', 'CategoriaController@criarCategoria');
Route::get('/getCategoria/{id}', 'CategoriaController@getCategoria');
Route::put('/atualizarCategoria/{id}', 'CategoriaController@atualizarCategoria');
Route::delete('/deletarCategoria/{id}', 'CategoriaController@deletarCategoria');

/*ClienteController*/
Route::post('/criarCliente', 'ClienteController@criarCliente');
Route::get('/getCliente/{id}', 'ClienteController@getCliente');
Route::put('/atualizarCliente/{id}', 'ClienteController@atualizarCliente');
Route::delete('/deletarCliente/{id}', 'ClienteController@deletarCliente');

/*PedidoController*/
Route::post('/criarPedido', 'PedidoController@criarPedido');
Route::get('/getPedido/{id}', 'PedidoController@getPedido');
Route::put('/atualizarPedido/{id}', 'PedidoController@atualizarPedido');
Route::delete('/deletarPedido/{id}', 'PedidoController@deletarPedido');

/*ProdutoController*/
Route::post('/criarProduto', 'ProdutoController@criarProduto');
Route::get('/getProduto/{id}', 'ProdutoController@getProduto');
Route::put('/atualizarProduto/{id}', 'ProdutoController@atualizarProduto');
Route::delete('/deletarProduto/{id}', 'ProdutoController@deletarProduto');