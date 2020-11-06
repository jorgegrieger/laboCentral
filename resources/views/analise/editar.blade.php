
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
                                        <form action="{{route('analise.salvar')}}" method="POST">
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
                                        <label for="text">Recebido em:</label>
                                        <input type="text" class="form-control" name="" value="{{$analises->produts->resparea}}" disabled>
                                        </div>
									    </div>
                                        </div>  
                                    </div>
                                   

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
									        <select id="tipo" name="tplaudo" class="form-control" >
                						        <option value="" selected disabled>Selecionar</option>
                  								<option>Análise</option>
                                                <option>Laudo</option>  
                  					        </select>
                                        </div>
									    </div>
                                        </div>   
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Laudo:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="laudo" rows="3"></textarea>
                                        </div>
									    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="text">Observações</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="laudo" rows="3"></textarea>
                                        </div>
									    </div>
                                        </div>  
                                        <div class="row">
                                        <div class="col-md-1">
                                        <div class="form-group">
                                        <a class="btn btn-success" href=""style="padding-right: 15px;">Aprovar</a>
                                        </div>
									    </div>
                                        <div class="col-md-1">
                                        <div class="form-group">
                                        <a class="btn btn-danger" href="" style="padding-right: 15px;">Reprovar</a>
                                        </div>
									    </div>
                                        </div>  
                                        <button class="btn btn-warning" style="
                                                                                padding-left: 80px;
                                                                                padding-right: 80px;
                                                                                ">Adicionar</button>
                                        </div>

                                    </form>
					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>

@include('footer')