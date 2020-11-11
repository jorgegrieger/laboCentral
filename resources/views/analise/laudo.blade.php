
@include('header')

@include('paineis')

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Liberação - Laudo Técnico</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
                            <li><a href="{{route('analise.index')}}">Liberação</a></li>
							<li class="active">Liberação - Laudo Técnico</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Informações Recebimento Nº{{$analises->id}}</strong>
					</div>
					<div class="card-body">
           
										@csrf
										<!-- Tratamento de Errors -->
										@if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                       
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                       
                                        </div>
                                        @endif
										<!-- Fim Tratamento -->
                                        <form action="{{route('analise.salvar',$analises->id)}}" method="POST">
										@csrf
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Nome Técnico:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->produts->nometec}}" disabled>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Nota Fiscal:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->nfe}}" disabled>
                                        </div>
									    </div>
                                        </div>   
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Fornecedor:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->fornecedores->nome}}" disabled>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Recebido em:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->created_at->format('d/m/Y H:i:s')}}" disabled>
                                        </div>
									    </div>
                                        </div>  
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Peso:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->pesonf}}kg" disabled>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Destino:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->produts->resparea}}" disabled>
                                        </div>
									    </div>
                                        </div>  
                                    </div>
                                    <input hidden type="text" class="form-control" name="st" value="Liberado">
                                   

					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->

<div class="content">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Liberação - Laudo Técnico</strong>
					</div>
					<div class="card-body">

										@csrf
										<!-- Tratamento de Errors -->
										@if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                       
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                       
                                        </div>
                                        @endif
										<!-- Fim Tratamento -->
										@csrf
                                        <input type="hidden" id="custId" name="recebimento_id" value="{{$analises->id}}">
                                        <input type="hidden" id="custId" name="produto_id" value="{{$analises->produts->id}}">
                                        <input type="hidden" id="custId" name="fornecedor_id" value="{{$analises->fornecedores->id}}">
                                        <input type="hidden" id="custId" name="$analise->st" value="">
                                        <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Recebido em Final de Semana?</label>
									        <select id="tipo" name="fds" class="form-control" >
                						        <option value="" selected disabled>Selecionar</option>
                  								<option>SIM</option>
                                                <option>NÃO</option>  
                  					        </select>
                                        </div>
									    </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Recebido por:</label>
                                        <select id="" name="analista_id" class="form-control" >
                                        <option value="" selected>Selecionar</option>
                							  @foreach($analista as $chave => $analistas)
                  								<option  value="{{$chave}}">{{$analistas}} </option>
                  							  @endforeach
                  						</select>
                                        </div>
									    </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Tipo de Liberação:</label>
									        <select id="" name="tplaudo" class="form-control" >
                						        <option value="" selected disabled>Selecionar</option>
                  								<option>Análise</option>
                                                <option>Laudo</option>  
                  					        </select>
                                        </div>
									    </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Situação:</label>
									        <select id="sit" name="sto" onChange="texto()" class="form-control" >
                						        <option value="" selected disabled>Selecionar</option>
                  								<option value="1">Aprovado</option>
                                                <option value="2">Reprovado</option>  
                  					        </select>
                                        </div>
									    </div> 
                                        </div>   
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Laudo:</label>
                                        <textarea class="form-control" id="text" name="laudo" rows="3"></textarea>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Observações</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="obs" rows="3"></textarea>
                                        </div>
									    </div>
                                        </div>
                                        <button class="btn btn-success" style="
                                                                                padding-left: 80px;
                                                                                padding-right: 80px;
                                                                                ">Adicionar</button>
                                        <a class="btn btn-danger" href="{{route('analise.index')}}" style="
                                                                                padding-left: 80px;
                                                                                padding-right: 80px;
                                                                                ">Cancelar</a>
                                        </div>

                                    </form>
					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->


<div class="clearfix"></div>
<script>
function texto()
{

var valor = $( "#sit" ).val();

if(valor == 1){

document.getElementById("text").value = 'PRODUTO {{$analises->produts->nometec}} LIBERADO POR ESTAR DENTRO DO ESPECIFICADO.';
}else{
    document.getElementById("text").value = 'PRODUTO {{$analises->produts->nometec}} REPROVADO POR NÃO ESTAR DENTRO DO ESPECIFICADO.';
}
}
</script>

@include('footer')

