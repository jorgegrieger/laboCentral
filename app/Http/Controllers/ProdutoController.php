<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use App\Arearesp;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;


class ProdutoController extends Controller
{
    public function index()
    {	
        $request = Produto::all(); 
        return view('produto.index',compact('request'));
    }

    public function adicionar()
    {
        $fornecedor = Fornecedor::all()->pluck('nome', 'id');
        $arearesp = Arearesp::all()->pluck('nome', 'id');
                return view('produto.add', compact('fornecedor', 'arearesp'));

    }

public function salvar(ProdutoRequest $request){
    
    \App\Produto::create($request->all());
    
    \Session::flash('flash_message',[
        'msg'=>"Produto adicionado com Sucesso!",
        'class'=>"alert-success"
    ]);

    return redirect()->route('produto.index');

}

public function editar($id)
{
    $produto = \App\Produto::find($id);
        return view('produto.editar',compact('produto'));
}

public function atualizar(ProdutoRequest $request, $id)
{
    $produto = \App\Produto::find($id)->update($request->all());
            \Session::flash('flash_message', [
                'msg' => 'produto atualizado com sucesso!',
                'class' => 'alert-success'
            ]);
            return redirect()->route('produto.index');
        
}

public function deletar ($id)
{
$produto = \App\Produto::find($id);
$produto->delete();

return redirect()->route('produto.index')->with('mensagem', 'O produto '.$produto->nome.' foi deletado com sucesso.');   
}

private $model;
public function __construct(produto $model)
{
    $this->model = $model;
}

/*public function geraPdf(){


    $data = produto::all();
    return PDF::loadView('produto.pdf', compact('data'))->stream();
}*/

}