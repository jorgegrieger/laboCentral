<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Fornecedor;
use App\Recebimento;
use App\Analises;
use App\Analista;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    

    public function index(){


        $requests = Analises::all();
        $produto = Produto::all();
        $requests = Analises::simplePaginate(15);
        $request = Recebimento::all();



        return view('relatorio.index', compact('requests','produto','request'));
    }
}
