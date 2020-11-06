<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use App\Recebimento;
use App\Analises;
use App\Analista;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\AnaliseRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;



class AnaliseController extends Controller
{
    public function index()
    {	
        $request = Analises::all();
        $request = Analises::simplePaginate(15);
        $request = Recebimento::where('st', '=','Pendente')->get();
        return view('analise.index',compact('request'));
    }

    public function adicionar()
    {
        $recebimento = Recebimento::all();

                return view('analise.add', compact('recebimento'));

    }

public function salvar(AnaliseRequest $request){
    
    \App\Analises::create($request->all());

    return redirect()->route('analise.index');

}

public function buscar(Request $request)
{
    $data = $request->get('criterio');
    $request = Recebimento::where('nfe', 'LIKE','%'.$data.'%')->get();

  if ($request->isempty()){
      return redirect()->route('analise.index')->with('erro','Nenhum produto com a nfe foi encontrado!');
  }
  return view ('analise.index', ['request' => $request]);
}

public function editar($id)
{
    $analises = \App\Recebimento::find($id);
    $analista = Analista::all()->pluck('nome', 'id');
        return view('analise.editar',compact('analises', 'analista'));
}

public function atualizar(AnaliseRequest $request, $id)
{
    $recebimento = \App\Analises::find($id)->update($request->all());
            return redirect()->route('analise.index');
        
}

public function deletar ($id)
{
$recebimento = \App\Analises::find($id);
$recebimento->delete();

return redirect()->route('analise.index')->with('mensagem', 'O recebimento '.$recebimento->nome.' foi deletado com sucesso.');   
}




/*public function geraPdf($id){


    $data = Analises::find($id);
    ini_set('max_execution_time', 300);
    return PDF::loadView('analise.pdf', compact('data'))->download('Analise#'.$id.'.pdf');
}
*/
}