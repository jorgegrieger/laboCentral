<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Database\Eloquent\SoftDeletes;


class RecebimentoController extends Controller
{
    public function index()
    {	
        $request = Recebimento::all();
        $request = Recebimento::simplePaginate(15);
        return view('recebimento.index',compact('request'));
    }

    public function adicionar()
    {
        $fornecedor = Fornecedor::all()->pluck('nome', 'id');
                return view('recebimento.add', compact('fornecedor'));

    }

public function salvar(RecebimentoRequest $request){
    
    \App\Recebimento::create($request->all());
    
    \Session::flash('flash_message',[
        'msg'=>"Recebimento adicionado com Sucesso!",
        'class'=>"alert-success"
    ]);

    return redirect()->route('recebimento.index');

}

public function editar($id)
{
    $recebimento = \App\Recebimento::find($id);
    $fornecedor = Fornecedor::all()->pluck('nome', 'id');
        return view('recebimento.editar',compact('recebimento','fornecedor'));
}

public function atualizar(RecebimentoRequest $request, $id)
{
    $recebimento = \App\Recebimento::find($id)->update($request->all());
            \Session::flash('flash_message', [
                'msg' => 'Recebimento atualizado com sucesso!',
                'class' => 'alert-success'
            ]);
            return redirect()->route('recebimento.index');
        
}

public function deletar ($id)
{
$recebimento = \App\Recebimento::find($id);
$recebimento->delete();

return redirect()->route('recebimento.index')->with('mensagem', 'O recebimento '.$recebimento->nome.' foi deletado com sucesso.');   
}

