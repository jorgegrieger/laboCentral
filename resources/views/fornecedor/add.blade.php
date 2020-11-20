@include('header')

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Cadastrar Fornecedores  </h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="">Inicio</a></li>
                            <li><a href="{{route('fornecedor.index')}}">Fornecedores</a></li>
							<li class="active">Cadastro de Fornecedores</li>
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
						<strong class="card-title">Adicionar fornecedores</strong>
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

                                        <form action="{{route('fornecedor.salvar')}}" method="POST">
										@csrf
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text">Nome:</label>
                                        <input type="text" class="form-control" name="nome" value="{{old('nome')}}">
                                    </div>
									</div>
                                    </div>
                            <div class="row">
							<div class="col-md-3">
							<div class="form-group">
                                        <label for="text">Codigo SAP:</label>
                                        <input type="text" class="form-control" name="fornsap" value="{{old('fornsap')}}">
                                    </div>
									</div>
									</div>
									<input type="hidden" class="form-control" name="st" value="A">
                                    <button class="btn btn-info">Adicionar</button>
                                    </div>
                                    </form>

					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>



@include('footer')