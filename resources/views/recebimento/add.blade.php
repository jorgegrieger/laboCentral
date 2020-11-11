
@include('header')

@include('paineis')

<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Adicionar Recebimento</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{route('home')}}">Inicio</a></li>
                            <li><a href="{{route('recebimento.index')}}">Recebimentos</a></li>
							<li class="active">Adicionar Recebimento</li>
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
						<strong class="card-title">Adicionar Recebimento</strong>
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
                                        <form action="{{route('recebimento.salvar')}}" method="POST">
										@csrf
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="text">Nome Técnico:</label>
									<select id="nametec" name="produto_id" class="form-control" >
                                    <option value="" selected>Selecionar</option>
                							  @foreach($produto as $key => $produtos)
                  								<option  value="{{$key}}"> {{$produtos}}</option>
                  							  @endforeach
                  						</select>
                                    </div>
									</div>
                                    </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                        <label for="text">Num Nota Fiscal:</label>
                                        <input type="text" class="form-control" name="nfe" value="{{old('nfe')}}">
                                    </div>
									</div>
                                    </div>   
                            <div class="row">
							<div class="col-md-6">
							<div class="form-group">
                            <label for="text">Fornecedor:</label>
                            <select id="" name="fornecedor_id" class="form-control" >
                                    <option value="" selected>Selecionar</option>
                							  @foreach($fornecedor as $chave => $fornecedores)
                  								<option  value="{{$chave}}">{{$chave}} | {{$fornecedores}} </option>
                  							  @endforeach
                  						</select>
            				</div>
							</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="text">Peso Liquido:</label>
                                        <input type="text" class="form-control" name="pesoliqnf" value="{{old('pesoliqnf')}}">
                                    </div>
									</div>
                                    </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="text">Peso Laboratório:</label>
                                        <input type="text" class="form-control" name="pesonf" value="{{old('pesonf')}}">
                                    </div>
									</div>
									</div>
									<input type="hidden" id="" name="st" value="Pendente"> </input>
                                    <button class="btn btn-info" href="">Adicionar</button>
									<br>
									<br>
									<p>Os produtos marcados como <strong>Desativado (D)</strong> não irão aparecer nesta lista.</p>
                                    </div>
                                    </form>
									

					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>

@include('footer')