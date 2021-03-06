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
Route::get('/analista/inativar/{id}','AnalistaController@inativar')->name('analista.inativar');
Route::POST('/analista/atualizar/{id}','AnalistaController@atualizar')->name('analista.atualizar');
Route::get('/analista/deletar/{id}','AnalistaController@deletar')->name('analista.deletar');
Route::get('/pdf','AnalistaController@geraPdf')->name('analista.pdf');

/*Rotas Fornecedores*/
Route::get('/fornecedor','FornecedorController@index')->name('fornecedor.index');
Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('fornecedor.add');
Route::get('/fornecedor/editar/{id}','FornecedorController@editar')->name('fornecedor.editar');
Route::get('/fornecedor/inativar/{id}','FornecedorController@inativar')->name('fornecedor.inativar');
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
Route::get('/produto/inativar/{id}','ProdutoController@inativar')->name('produto.inativar');
Route::get('/produto/ativar/{id}','ProdutoController@ativar')->name('produto.ativar');
Route::POST('/produto/salvar','ProdutoController@salvar')->name('produto.salvar');
Route::POST('/produto/atualizar/{id}','ProdutoController@atualizar')->name('produto.atualizar');
Route::get('/produto/deletar/{id}','ProdutoController@deletar')->name('produto.deletar');


/*Rotas de Recebimento*/
Route::get('/recebimento','RecebimentoController@index')->name('recebimento.index');
Route::get('/recebimento/adicionar/','RecebimentoController@adicionar')->name('recebimento.add');
Route::get('/recebimento/editar/{id}','RecebimentoController@editar')->name('recebimento.editar');
Route::POST('/recebimento/salvar/','RecebimentoController@salvar')->name('recebimento.salvar');
Route::POST('/recebimento/atualizar/{id}','RecebimentoController@atualizar')->name('recebimento.atualizar');
Route::get('/recebimento/deletar/{id}','RecebimentoController@deletar')->name('recebimento.deletar');
Route::get('/pdf/{id}','RecebimentoController@geraPdf')->name('recebimento.pdf');
Route::get('/recebimento/buscar','RecebimentoController@buscar')->name('recebimento.buscar');

/*Rotas de Analise*/
Route::get('/analise','AnaliseController@index')->name('analise.index');
Route::get('/analise/adicionar','AnaliseController@adicionar')->name('analise.add');
Route::get('/analise/laudo/{id}','AnaliseController@laudo')->name('analise.laudo');
Route::POST('/analise/salvar/{id}','AnaliseController@salvar')->name('analise.salvar');
Route::get('/analise/editar/{id}','AnaliseController@editar')->name('analise.editar');
Route::POST('/analise/atualizar/{id}','AnaliseController@atualizar')->name('analise.atualizar');
Route::get('/analise/deletar/{id}','AnaliseController@deletar')->name('analise.deletar');
Route::get('/pdfs/{id}','AnaliseController@geraPdf')->name('analise.pdf');
Route::get('/analise/buscar','AnaliseController@buscar')->name('analise.buscar');
Route::get('/analise/relatorio', 'AnaliseController@geraPdf2')->name('analise.relatorio');

/*Rotas de Relatórios*/
Route::get('/relatorios','RelatorioController@index')->name('relatorio.index');