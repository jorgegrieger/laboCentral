@include('header')

<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Laudos e Liberações</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
							<li class="active">Laudos e Liberações</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Relatorios</strong>
					</div>
					<br>

					
					<div class="col-sm-3">
					<form action="{{route('analise.relatorio')}}" method="get">
					<div class="input-group">								

		
					<select id="" name="id" class="form-control" >
                                        <option value="" selected>Selecionar Produto</option>
                							  @foreach($produto as $produtos)
                  								<option  value="{{$produtos->id}}">{{$produtos->nometec}} </option>
                  							  @endforeach
                  						</select>
					
										  <div class="input-group-btn">
						<button class="btn btn-primary" style="
    												border-left-width: 5px;
    												margin-left: 9px;" 
													>Procurar</button>
													</div>
												
											</div>
										</div>
										
					<div class="card-body">

		
					@if(session('mensagem'))

					<div class="sufee-alert alert with-close alert-success alert-dismissible fade show col-md-6">
                                        {{session('mensagem')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
									</div>

					
					@elseif(session('erro'))

					<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-md-6">
                                        {{session('erro')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
									</div>

					@endif
					</div>
										
						</div>
						</form>

			
				
			</div>
		</div>
	</div>
</div>
<br>
<div class="content">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Liberações Pendentes</strong>
					</div>
					<br>
					<div class="col-sm-3">
					<form action="{{route('analise.buscar')}}" method="get">
					<div class="input-group">
											<input type="text" name="criterio" placeholder="Pesquisa por NFE"  
											data-toggle="tooltip" data-placement="top" title="Digite para fazer a busca" class="form-control">
											<div class="input-group-btn"><button class="btn btn-primary" 
											style="
    												border-left-width: 5px;
    												margin-left: 9px;"
													>Procurar</button>
											</div>
										</form>
										</div>
									
										</div>

			

					<div class="card-body">

		
					@if(session('mensagem'))

					<div class="sufee-alert alert with-close alert-success alert-dismissible fade show col-md-6">
                                        {{session('mensagem')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
									</div>

					
					@elseif(session('erro'))

					<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-md-6">
                                        {{session('erro')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
									</div>

					@endif
					</div>
					<div class="card-body">
						<table id="tabela" class="table table-striped" >
						<thead>
								<tr>
									<th>#</th>
									<th>Nome Técnico</th>
									<th>Produto BO Paper</th>
									<th>Nota Fiscal</th>
									<th>Fornecedor</th>
									<th>Area Responsavel</th>
									<th>Peso Liquido</th>
									<th>Peso Laboratório</th>
									<th>Situação</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($request as $recebimento)
								<tr>
									<th scope="row">{{ $recebimento->id }}</th>
									<td>{{ $recebimento->produts->nometec}}</td>
									<td>{{ $recebimento->produts->produtobo}}</td>
									<td>{{ $recebimento->nfe}}</td>
                                    <td>{{ $recebimento->fornecedores->nome}}</td>
									<td>{{ $recebimento->produts->resparea}}</td>
                                    <td>{{$recebimento->pesoliqnf}}</td>
									<td>{{$recebimento->pesonf}}</td>
									<td>{{$recebimento->st}}</td>

									<td style="height: 53px; width: 324px;">
                                    <a class="btn btn-success" href="{{route('analise.laudo',$recebimento->id)}}">Realizar Laudo</a>
								
                                </td>															
								</tr>
								@endforeach
							</tbody>
						</tbody>
					</table>
				
				</div>
			</div>
		</div>

	</div>
</div><!-- .animated -->
</div><!-- .content -->
<div class="content">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Laudos</strong>
					</div>
					<br>

					<div class="card-body">
						<table id="tabela" class="table table-striped" >
						<thead>
								<tr>
									<th>#</th>
									<th>Nota Fiscal</th>
									<th>Produto BO Paper</th>
									<th>Data</th>
									<th>Analista</th>
									<th>Tipo</th>
									<th>Final de Semana</th>
									<th>Situação</th>
									<th>Ação</th>

								</tr>
							</thead>
							<tbody>
							@foreach ($requests as $recebimentos)
								<tr>
									<th scope="row">{{ $recebimentos->id }}</th>
									<td>{{ $recebimentos->recebiments->nfe}}</td>
									<td>{{ $recebimentos->produts->nometec}}</td>
									<td>{{$recebimentos->created_at->format('d/m/Y H:i:s')}}</td>
                                    <td>{{$recebimentos->analist->nome}}</td>
									<td>{{$recebimentos->tplaudo}}</td>
									<td>{{$recebimentos->fds}}</td>
									@if($recebimentos->sto == 1)
									<td>Aprovado</td>
									@else
									<td>Reprovado</td>
									@endif
									<td style="height: 53px; width: 324px;">
                                    <a class="btn btn-custom" href="{{route('analise.editar',$recebimentos->id)}}">Editar</a>
									<a class="btn btn-warning" href="{{route('analise.pdf',$recebimentos->id)}}">Emitir Laudo</a>
								
                                </td>
								</tr>
								@endforeach
							</tbody>
						</tbody>
					</table>
				
				</div>
			</div>
		</div>

	</div>
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>


<script>
function myFunction() {
 var teste = confirm("Deseja deletar este recebimento?");

 if (teste == true){
		window.location.href = "{{route('recebimento.index')}}";
 }else{
	 window.location.href = "{{route('recebimento.index')}}";
 }
 }

</script>@include('footer')