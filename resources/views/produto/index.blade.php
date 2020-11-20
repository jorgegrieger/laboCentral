@include('header')

<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Produtos</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
							<li class="active">Produtos</li>
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
						<strong class="card-title">Produtos</strong>
					</div>
					<br>
					<div class="col-sm-6">
					<form action="" method="get">
				
					<!--<div class="input-group">

											<input type="text" name="criterio" placeholder="Digite algo.."  
											data-toggle="tooltip" data-placement="top" title="Digite para fazer a busca" class="form-control">
											<div class="input-group-btn"><button class="btn btn-primary">Procurar</button>
											</div>
										</form>
										</div>
-->							
										</div>

					<div class="card-body">

					<a class="btn btn-success" href="{{ route('produto.add') }}">Adicionar produto</a>
					<div class="row">
					<div class="col-md-3">
					<label for="text">Data inicial:</label>
							<input type="text" class="form-control" name="from_date" value="">
					</div>
					<div class="col-md-3">
					<label for="text">Data Final:</label>
							<input type="text" class="form-control" name="to_date" value="">
					</div>
					</div>
					<br>
					<br>

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
									<th>Produto</th>
									<th>Comercial</th>
									<th>Área Responsável</th>
									<th>Cod. SAP</th>
									<th>Situação</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($request as $produtos)
								<tr>
									<th scope="row">{{ $produtos->id }}</th>
									<td>{{ $produtos->produtobo }}</td>
									<td>{{ $produtos->nometec}}</td>
								
									<td>{{ $produtos->resparea}}</td>
								
									
									@if($produtos->cosap != NULL)
									<td>{{ $produtos->cosap}}</td>
									@else
									<td>NDA</td>
									@endif
									<td>{{ $produtos->st}}</td>
									<td style="height: 53px; width: 324px;">
                                    <a class="btn btn-custom" href="{{route('produto.editar',$produtos->id)}}">Editar</a>
									@if($produtos->st == 'A')
									<a class="btn btn-secondary"  href="{{route('produto.inativar',$produtos->id)}}">Inativar</a>
									@else
									<a class="btn btn-success"  href="{{route('produto.inativar',$produtos->id)}}">Ativar</a>
									@endif
                                </td>															
								</tr>
								@endforeach
							</tbody>
						</tbody>
					</table>
					{{ $request->links() }}
				</div>
			</div>
		</div>

	</div>
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>


<script>
function myFunction() {
 var teste = confirm("Deseja deletar este produto?");

 if (teste == true){
		window.location.href = "{{route('produto.index')}}";
 }else{
	 window.location.href = "{{route('produto.index')}}";
 }
 }

</script>@include('footer')