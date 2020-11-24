<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Analises;
use PdfReport;

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
        $fornecedor = DB::table("fornecedors")->where('st','A')->pluck('nome','id');
                return view('produto.add', compact('fornecedor'));

    }


    public function displayReport(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('nometec');
    
        $title = 'Registered User Report'; // Report title
    
        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
            'Sort By' => $sortBy
        ];
    
        $queryBuilder = Analises::join('produtos','analises.produto_id','=','produtos.id')
        ->join('analistas','analises.analista_id','=','analistas.id')
        ->join('recebimentos','analises.recebimento_id','=','recebimentos.id')
        ->join('fornecedors','analises.fornecedor_id','=','fornecedors.id')
        ->select('produtos.id', 'produtos.nometec', 'analises.id', 'recebimentos.created_at','recebimentos.nfe',
        'recebimentos.pesonf','produtos.resparea','analises.created_at','analistas.nome',
        'fornecedors.nome','analises.laudo','analises.obs')
        ->get();
    
        $columns = [ // Set Column to be displayed
            'Cod. Produto' => 'produtos.id',
            'Nome' => 'produtos.nometec',
            'Cod Analise' => 'analises.id',
            'Data Recebimento' => 'recebimentos.created_at',
            'NFe' => 'recebimentos.nfe',
            'Peso NF' => 'recebimentos.pesonf',
            'Área' => 'produtos.resparea',
            'Data Análise' => 'analises.created_at',
            'Responsável' => 'analistas.nome',
            'Fornecedor' => 'fornecedors.nome',
            'Analise/Laudo' => 'analises.laudo',
            'Observações' => 'analises.obs',
        ];
    
        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
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


}