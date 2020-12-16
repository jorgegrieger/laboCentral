@include('header')



<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Sistema Laboratório Central</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Relatório de Laudos por Produtos</strong>
					</div>
					<div class="card-body">
                    <div class="row">

					<div class="col-sm-8">
					<form action="{{route('analise.relatorio')}}" method="get">
					<div class="input-group">				

					<div class="form-group">
					<label for="date">Produto:</label>
					<select id="" name="id" class="form-control" >

                                        <option value="" selected>Selecionar Produto</option>
                							  @foreach($produto as $produtos)
                  								<option  value="{{$produtos->id}}">{{$produtos->nometec}} </option>
                  							  @endforeach
                  						</select>
										  <label for="date">Data Inicial:</label>
										  <input type="date" name="dedata" placeholder="Pesquisa por data inicial"  
											data-toggle="tooltip" data-placement="top" title="Data Inicial" class="form-control">
											<label for="date">Data Final:</label>
											<input type="date" name="pradata" placeholder="Pesquisa por data final"  
											data-toggle="tooltip" data-placement="top" title="Data Final" class="form-control">
											<br>
										  <div class="input-group-btn">
						<button class="btn btn-primary" style="
    												border-left-width: 5px;
    												margin-left: 9px;" 
													>Procurar</button>
													</div>
												
								</form>
								</div>
								</div>
								</div>			

					</div>
                    </div>
					
				</div>
				

    
</div>
<!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>
 
@include('footer')