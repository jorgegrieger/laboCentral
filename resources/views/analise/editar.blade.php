
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
						<strong class="card-title">Edição - Laudo Técnico Nº{{$analises->id}}</strong>
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
                                        <form action="{{route('analise.atualizar',$analises->id)}}" method="POST">
										@csrf

                                        <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Recebido em Final de Semana?</label>
									        <select id="tipo" name="fds" class="form-control" >
                						        <option value="{{$analises->fds}}" selected>{{$analises->fds}}</option>
                  								<option>SIM</option>
                                                <option>NÃO</option>  
                  					        </select>
                                        </div>
									    </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Recebido por:</label>
                                        <select id="" name="analista_id" class="form-control" >
                                        <option value="{{$analises->analista_id}}" selected>{{$analises->analist->nome}}</option>
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
                						        <option value="{{$analises->fds}}" selected>{{$analises->tplaudo}}</option>
                  								<option>Análise</option>
                                                <option>Laudo</option>  
                  					        </select>
                                        </div>
									    </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="text">Situação:</label>
									        <select id="sit" name="sto" onChange="texto()" class="form-control" >
                						        <option value="" selected>{{$analises->sto == '1'? "Aprovado" : "Reprovado"}}</option>
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
                                        <textarea class="form-control" id="text" name="laudo" rows="3">{{$analises->laudo}}</textarea>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Observações</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="obs" rows="3">{{$analises->obs}}</textarea>
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

