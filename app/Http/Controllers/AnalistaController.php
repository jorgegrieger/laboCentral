<?php

namespace App\Http\Controllers;
use App\Analista;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\AnalistaRequest;

class AnalistaController extends Controller
{

		
    public function index()
    {	
        $request = Analista::all(); 
        return view('analista.index',compact('request'));
    }

    public function adicionar()
    {
        return view('analista.add');

    }

public function salvar(AnalistaRequest $request){
    
    Analista::create($request->all());
    
    \Session::flash('flash_message',[
        'msg'=>"Analista adicionado com Sucesso!",
        'class'=>"alert-success"
    ]);

    return redirect()->route('analista.index');

}

public function editar($id)
{
    $analista = \App\Analista::find($id);
        return view('analista.editar',compact('analista'));
}

public function atualizar(AnalistaRequest $request, $id)
{
    $analista = \App\Analista::find($id)->update($request->all());
            \Session::flash('flash_message', [
                'msg' => 'Analista atualizado com sucesso!',
                'class' => 'alert-success'
            ]);
            return redirect()->route('analista.index');
        
}


private $model;
public function __construct(Analista $model)
{
    $this->model = $model;
}

public function inativar($id)
{
    $analista = Analista::find($id);
    if ($analista->st == 'A'){
        $analista->st = 'D';
    }else{
        $analista->st = 'A';
    }
    $analista->save();

    return redirect()->route('analista.index');
}

}