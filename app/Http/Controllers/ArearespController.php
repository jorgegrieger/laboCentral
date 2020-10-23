<?php

namespace App\Http\Controllers;
use App\Arearesp;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ArearespRequest;

class ArearespController extends Controller
{
    public function index()
    {	
        $request = Arearesp::all(); 
        return view('arearesp.index',compact('request'));
    }

    public function adicionar()
    {
        return view('arearesp.add');

    }

public function salvar(arearespRequest $request){
    
    \App\Arearesp::create($request->all());
    
    \Session::flash('flash_message',[
        'msg'=>"Área adicionada com Sucesso!",
        'class'=>"alert-success"
    ]);

    return redirect()->route('arearesp.index');

}

public function editar($id)
{
    $arearesp = \App\Arearesp::find($id);
        return view('arearesp.editar',compact('arearesp'));
}

public function atualizar(arearespRequest $request, $id)
{
    $arearesp = \App\Arearesp::find($id)->update($request->all());
            \Session::flash('flash_message', [
                'msg' => 'A Área foi atualizada com sucesso!',
                'class' => 'alert-success'
            ]);
            return redirect()->route('arearesp.index');
        
}

public function deletar ($id)
{
$arearesp = \App\Arearesp::find($id);
$arearesp->delete();

return redirect()->route('arearesp.index')->with('mensagem', 'A área '.$arearesp->nome.' foi deletada com sucesso.');   
}
}
