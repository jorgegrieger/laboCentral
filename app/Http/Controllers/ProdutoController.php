<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {	
        $request = Produto::all(); 
        return view('produto.index',compact('request'));
    }

    public function adicionar()
    {
        return view('produto.add');

    }

public function salvar(produtoRequest $request){
    
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

public function atualizar(produtoRequest $request, $id)
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