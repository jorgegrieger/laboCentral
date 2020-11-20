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
    
        $queryBuilder = User::select(['name', 'balance', 'registered_at']) // Do some querying..
                            ->whereBetween('registered_at', [$fromDate, $toDate])
                            ->orderBy($sortBy);
    
        $columns = [ // Set Column to be displayed
            'Name' => 'name',
            'Registered At', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Total Balance' => 'balance',
            'Status' => function($result) { // You can do if statement or any action do you want inside this closure
                return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
            }
        ];
    
        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                        ->editColumn('Registered At', [ // Change column class or manipulate its data for displaying to report
                            'displayAs' => function($result) {
                                return $result->registered_at->format('d/M/Y');
                            },
                            'class' => 'left'
                        ])
                        ->editColumns(['Total Balance', 'Status'], [ // Mass edit column
                            'class' => 'right bold'
                        ])
                        ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                            'Total Balance' => 'point' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                        ])
                        ->limit(20) // Limit record to be showed
                        ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
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