<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<div clas="container">
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<img src="https://imagizer.imageshack.com/img924/3340/8zqaBA.jpg" style="width:100%; max-width:300px;">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<span class="fontsize">HISTÓRICO DE LAUDOS POR ITEM</span>
	</div>
	</div>
	@if(!$data->isEmpty())
<div class="table-responsive-xs-sm-md-lg">
<table id="tabela" class="table table-striped" >
<thead>
	<tr class="fonte">
									<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Codigo</th>
									<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Nome</th>

									</tr>
									</thead>
									 	<tbody>									
													@foreach ($prd as $prod)
													<tr class="font">
													<td>{{$prod->id}}</td>
													<td>{{$prod->nometec}}</td>
													</tr>
													@endforeach
													</tbody>
													</table>
													</div>
										


<div class="table-responsive-xs-sm-md-lg">

<table id="tabela" class="table table-striped" >
						<thead>
								<tr class="fonte">
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Cod. Analise</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Data Recebimento</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Nfe</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Peso NFe</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Fornecedor</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Area Responsavel</th>
                                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Data Analise</th>
                                    <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Analista Resp.</th>
									<th class="col-xs-2 col-sm-2 col-md-1 col-lg-2">Situação</th>
                                    <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Laudo</th>
                                    <th class="col-xs-2 col-sm-2 col-md-1 col-lg-2">OBS</th>
                                    

								</tr>
							</thead>
							<tbody>
							@foreach ($data as $produtos)
								<tr class="font">
									<td>{{$produtos->ana_id}}</td>
									<td>{{$produtos->data_rec}}</td>
									<td>{{$produtos->nfe}}</td>
									<td>{{$produtos->pesonf}}</td>
									<td>{{$produtos->nome}}</td>
									<td>{{$produtos->resparea}}</td>
									<td>{{$produtos->data_laudo}}</td>
									<td>{{$produtos->ana_nome}}</td>
									@if($produtos->sto == '1')
										<td>Aprovado</td>
									@else
										<td>Reprovado</td>
									@endif
									<td>{{$produtos->laudo}}</td>
									<td>{{$produtos->obs}}</td>
                                </td>															
								</tr>
								@endforeach
							</tbody>
						
					</table>
					</div>
				@else
					Nenhum Produto foi Encontrado.
				@endif

</div>
<style>
.fonte {
	font-size: 12px;
}

.font {
	font-size: 11px;
}

.col-sem-margem {
    padding-left: 0px;
    width: 10px;
}

.fontsize {
	font-size: 30px;
	font-family: Impact, Charcoal, sans-serif;
	font-weight: bold;
}
</style>