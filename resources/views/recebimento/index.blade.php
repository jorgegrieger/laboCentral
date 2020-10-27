@include('header')

<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Recebimento de Máteria Prima</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
							<li class="active">Recebimento de Máteria Prima</li>
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
						<strong class="card-title">Recebimento de Máteria Prima</strong>
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

					<a class="btn btn-success" href="{{ route('recebimento.add') }}">Adicionar Registro</a>
					
			
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
									<th>Nome Técnico</th>
									<th>Produto BO Paper</th>
									<th>Nota Fiscal</th>
									<th>Fornecedor</th>
									<th>Area Responsavel</th>
									<th>Peso Liquido</th>
                                    <th>Peso Laboratório</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($request as $recebimentos)
								<tr>
									<th scope="row">{{ $recebimentos->id }}</th>
									<td>{{ $recebimentos->produts->nometec}}</td>
									<td>{{ $recebimentos->produts->produtobo}}</td>
									<td>{{ $recebimentos->nfe}}</td>
                                    <td>{{ $recebimentos->fornecedores->nome}}</td>
									<td>{{ $recebimentos->produts->resparea}}</td>
                                    <td>{{$recebimentos->pesoliqnf}}</td>
                                    <td>{{$recebimentos->pesonf}}</td>

									<td style="height: 53px; width: 324px;">
                                    <a class="btn btn-custom" href="{{route('recebimento.editar',$recebimentos->id)}}">Editar</a>
									<a class="btn btn-danger"  href="javascript: (confirm('Deseja deletar o recebimento : {{$recebimentos->id}}?') ? window.location.href='{{route('recebimento.deletar',$recebimentos->id)}}' : false )">Deletar</a>
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
 var teste = confirm("Deseja deletar este recebimento?");

 if (teste == true){
		window.location.href = "{{route('recebimento.index')}}";
 }else{
	 window.location.href = "{{route('recebimento.index')}}";
 }
 }

</script>@include('footer')