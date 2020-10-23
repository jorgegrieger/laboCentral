
@include('header')

@include('paineis')

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Cadastrar Produtos</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
                            <li><a href="{{route('produto.index')}}">Produtos</a></li>
							<li class="active">Cadastro de Produtos</li>
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
						<strong class="card-title">Adicionar Produtos</strong>
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

                                        <form action="{{route('produto.salvar')}}" method="POST">
										@csrf
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text">Produto:</label>
                                        <input type="text" class="form-control" name="produtobo" value="{{old('produtobo')}}">
                                    </div>
									</div>
                                    </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text">Comercial:</label>
                                        <input type="text" class="form-control" name="nometec" value="{{old('nometec')}}">
                                    </div>
									</div>
                                    </div>
                            <div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Fornecedor:</label>
									<select id="" name="fornecedor_id" class="form-control" >
                                    <option value="" selected disabled>Selecionar</option>
                							  @foreach($fornecedor as $key => $fornecedores)
                  								<option  value="{{$key}}"> {{$fornecedores}}</option>
                  							  @endforeach
                  						</select>
            				</div>
							</div>
                            </div>
                            <div class="row">
							<div class="col-md-6">
							<div class="form-group">
							<label for="text">Área Responsável:</label>
									<select id="" name="resparea_id" class="form-control" >
                                    <option value="" selected disabled>Selecionar</option>
                							  @foreach($arearesp as $key => $areasresps)
                  								<option  value="{{$key}}"> {{$areasresps}}</option>
                  							  @endforeach
                  						</select>
            				</div>
							</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="text">Cod. SAP:</label>
                                        <input type="text" class="form-control" name="cosap" value="{{old('st')}}">
                                    </div>
									</div>
                                    </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="text">Status:</label>
                                        <input type="text" class="form-control" name="st" value="{{old('st')}}">
                                    </div>
									</div>
                                    </div>
                                    <button class="btn btn-info">Adicionar</button>
                                    </div>
                                    </form>

					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>


@include('footer')