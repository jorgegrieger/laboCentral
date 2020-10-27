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

})->name('home');


/*Rotas Analistas*/
Route::get('/analista','AnalistaController@index')->name('analista.index');
Route::get('/analista/adicionar','AnalistaController@adicionar')->name('analista.add');
Route::get('/analista/editar/{id}','AnalistaController@editar')->name('analista.editar');
Route::POST('/analista/salvar','AnalistaController@salvar')->name('analista.salvar');
Route::POST('/analista/atualizar/{id}','AnalistaController@atualizar')->name('analista.atualizar');
Route::get('/analista/deletar/{id}','AnalistaController@deletar')->name('analista.deletar');
Route::get('/pdf','AnalistaController@geraPdf')->name('analista.pdf');

/*Rotas Fornecedores*/
Route::get('/fornecedor','FornecedorController@index')->name('fornecedor.index');
Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('fornecedor.add');
Route::get('/fornecedor/editar/{id}','FornecedorController@editar')->name('fornecedor.editar');
Route::POST('/fornecedor/salvar','FornecedorController@salvar')->name('fornecedor.salvar');
Route::POST('/fornecedor/atualizar/{id}','FornecedorController@atualizar')->name('fornecedor.atualizar');
Route::get('/fornecedor/deletar/{id}','FornecedorController@deletar')->name('fornecedor.deletar');

/*Rotas Areas Responsaveis
Route::get('/arearesp','ArearespController@index')->name('arearesp.index');
Route::get('/arearesp/adicionar','ArearespController@adicionar')->name('arearesp.add');
Route::get('/arearesp/editar/{id}','ArearespController@editar')->name('arearesp.editar');
Route::POST('/arearesp/salvar','ArearespController@salvar')->name('arearesp.salvar');
Route::POST('/arearesp/atualizar/{id}','ArearespController@atualizar')->name('arearesp.atualizar');
Route::get('/arearesp/deletar/{id}','ArearespController@deletar')->name('arearesp.deletar');*/

/*Rotas Produtos*/
Route::get('/produto','ProdutoController@index')->name('produto.index');
Route::get('/produto/adicionar','ProdutoController@adicionar')->name('produto.add');
Route::get('/produto/editar/{id}','ProdutoController@editar')->name('produto.editar');
Route::POST('/produto/salvar','ProdutoController@salvar')->name('produto.salvar');
Route::POST('/produto/atualizar/{id}','ProdutoController@atualizar')->name('produto.atualizar');
Route::get('/produto/deletar/{id}','ProdutoController@deletar')->name('produto.deletar');

/*Rotas de Recebimento*/
Route::get('/recebimento','RecebimentoController@index')->name('recebimento.index');
Route::get('/recebimento/adicionar','RecebimentoController@index')->name('recebimento.adicionar');