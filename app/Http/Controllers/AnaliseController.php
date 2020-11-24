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
use DB;



class AnaliseController extends Controller
{
    public function index()
    {	
        $requests = Analises::all();
        $produto = Produto::all();
        $requests = Analises::simplePaginate(15);
        $request = Recebimento::where('st', '=','Pendente')->get();
        return view('analise.index',compact('request','requests','produto'));
    }

    public function adicionar()
    {
        $recebimento = Recebimento::all();

                return view('analise.add', compact('recebimento'));

    }

public function salvar(AnaliseRequest $request, $id){
    \App\Recebimento::find($id)->update($request->all());
    \App\Analises::create($request->all());
;

    return redirect()->route('analise.index');

}

public function buscar(Request $request)
{   
    $produto = Produto::all();
    $data = $request->get('criterio');
    $request = Recebimento::where('nfe', 'LIKE','%'.$data.'%')->get();
    $requests = Analises::all();
  if ($request->isempty()){
      return redirect()->route('analise.index')->with('erro','Nenhum produto com a nfe foi encontrado!');
  }
  return view ('analise.index',compact('produto','request','requests'));
}

public function laudo($id)
{
    $analises = \App\Recebimento::find($id);
    $analista = Analista::all()->pluck('nome', 'id');
    $prod = Produto::all()->pluck('nometec', 'id');

        return view('analise.laudo',compact('analises', 'analista','prod'));
}

public function editar($id)
{
    $receb = \App\Recebimento::find($id);
    $analises = \App\Analises::find($id);
    $analista = Analista::all()->pluck('nome', 'id');
    $prod = Produto::all()->pluck('nometec', 'id');

        return view('analise.editar',compact('analises', 'analista','prod','receb'));
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




public function geraPdf($id){

    $data = Analises::find($id);
    ini_set('max_execution_time', 300);
    return PDF::loadView('analise.pdf', compact('data'))->stream('Analise#'.$id.'.pdf');
}

public function geraPdf2(Request $request){
 
   
    $prd = Produto::find($request);

    $toDate = $request->input('id');
 

    $data = Analises::join('produtos','analises.produto_id','=','produtos.id')
    ->join('analistas','analises.analista_id','=','analistas.id')
    ->join('recebimentos','analises.recebimento_id','=','recebimentos.id')
    ->join('fornecedors','analises.fornecedor_id','=','fornecedors.id')
    ->select('produtos.id', 'produtos.nometec', 'analises.id as ana_id', 'recebimentos.created_at as data_rec','recebimentos.nfe',
    'recebimentos.pesonf','produtos.resparea','analises.created_at as data_laudo','analistas.nome as ana_nome',
    'fornecedors.nome','analises.sto','analises.laudo','analises.obs')->where('produtos.id','=',$toDate)
    ->get();



    return PDF::loadView('analise.relatorio', compact('data','prd'))->setPaper('a4', 'landscape')->stream();
}
}