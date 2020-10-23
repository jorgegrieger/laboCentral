@include('header')

<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Analistas</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="">Inicio</a></li>
							<li class="active">Analistas</li>
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
						<strong class="card-title">Analistas</strong>
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

					<a class="btn btn-success" href="{{ route('analista.add') }}">Adicionar Analista</a>
					
			
					<br>
					<br>
					<a class="btn btn-success" href="{{ route('analista.pdf') }}">Relatório</a>

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
									<th>Nome</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($request as $analistas)
								<tr>
									<th scope="row">{{ $analistas->id }}</th>
									<td>{{ $analistas->nome }}</td>
									<td style="height: 53px; width: 200px;">
                                    <a class="btn btn-custom" href="{{route('analista.editar',$analistas->id)}}">Editar</a>
									<a class="btn btn-danger"  href="javascript: (confirm('Deseja deletar o analista : {{$analistas->nome}}?') ? window.location.href='{{route('analista.deletar',$analistas->id)}}' : false )">Deletar</a>
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
 var teste = confirm("Deseja deletar este serviço?");

 if (teste == true){
		window.location.href = "{{route('analista.index')}}";
 }else{
	 window.location.href = "{{route('analista.index')}}";
 }
 }

</script>

@include('footer')