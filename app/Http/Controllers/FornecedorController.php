<?php

namespace App\Http\Controllers;
use App\Fornecedor;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FornecedorRequest;
class FornecedorController extends Controller
{
    public function index()
    {	
        $request = DB::table('fornecedors')->simplePaginate(20); 
        return view('fornecedor.index',compact('request'));
    }

    public function adicionar()
    {
        return view('fornecedor.add');

    }

public function salvar(FornecedorRequest $request){
    
    \App\Fornecedor::create($request->all());
    
    \Session::flash('flash_message',[
        'msg'=>"Fornecedor adicionado com Sucesso!",
        'class'=>"alert-success"
    ]);

    return redirect()->route('fornecedor.index');

}

public function editar($id)
{
    $fornecedor = \App\Fornecedor::find($id);
        return view('fornecedor.editar',compact('fornecedor'));
}

public function atualizar(fornecedorRequest $request, $id)
{
    $fornecedor = \App\Fornecedor::find($id)->update($request->all());
            \Session::flash('flash_message', [
                'msg' => 'fornecedor atualizado com sucesso!',
                'class' => 'alert-success'
            ]);
            return redirect()->route('fornecedor.index');
        
}

public function deletar ($id)
{
$fornecedor = \App\Fornecedor::find($id);
$fornecedor->delete();

return redirect()->route('fornecedor.index')->with('mensagem', 'O fornecedor '.$fornecedor->nome.' foi deletado com sucesso.');   
}


public function inativar($id)
{
    $fornecedor = Fornecedor::find($id);
    if ($fornecedor->st == 'A'){
        $fornecedor->st = 'D';
    }else{
        $fornecedor->st = 'A';
    }
    $fornecedor->save();

    return redirect()->route('fornecedor.index');
}
}
