<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
/*use App\Http\Requests\ProdutoRequest;*/
/*use App\Produto;*/
/*use App\Fornecedor;*/
use DB;

class RecebimentoController extends Controller
{


    public function index(){

        $produtos = Produto::all();

        return view('produtos.index', compact('produtos'));
    }
    public function adicionar()
    {
      
        $fornecedor = Fornecedor::all()->pluck('nome', 'id');
        return view ('produtos.addproduto', compact('fornecedor'));
    }


    public function editar($id)
    {
        $achaProduto = Produto::find($id);

         


        return view('produtos.editar',compact('achaProduto'));
    }


    public function salvar(ProdutoRequest $request){
         \App\Produto::create( $request->all());
        
         return redirect()->route('produto.index');

        }


        public function buscar (Request $request)
        {

          $busca = $request->get('criterio');
          $produtos = DB::table('produtos')->where('nome', 'LIKE','%'.$busca.'%')->paginate();
        
          if ($produtos->isempty()){
              return redirect()->route('produto.index')->with('erro','Nenhum produto foi encontrado!');
          }
          return view ('produtos.index', ['produtos' => $produtos]);
        }

        public function deletar ($id)
        {
            $produto = \App\Produto::find($id);
            $produto->delete();
        
            return redirect()->route('produto.index')->with('mensagem', 'O Produto '.$produto->nome.' foi deletado com sucesso.');   
        }
    
}
