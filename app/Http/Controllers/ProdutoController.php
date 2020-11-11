<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProdutoController extends Controller
{
    public function index()
    {	
        $request = Produto::all();
        $request = Produto::simplePaginate(15);
        return view('produto.index',compact('request'));
    }

    public function adicionar()
    {
        $fornecedor = Fornecedor::all()->pluck('nome', 'id');
                return view('produto.add', compact('fornecedor'));

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
    $fornecedor = Fornecedor::all()->pluck('nome', 'id');
        return view('produto.editar',compact('produto','fornecedor'));
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

public function inativar($id)
{
    $produto = Produto::find($id);
    if ($produto->st == 'A'){
        $produto->st = 'D';
    }else{
        $produto->st = 'A';
    }
    $produto->save();

    return redirect()->route('produto.index');
}

/*public function geraPdf(){


    $data = produto::all();
    return PDF::loadView('produto.pdf', compact('data'))->stream();
}*/

}