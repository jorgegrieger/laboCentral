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
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Página Inicial</strong>
					</div>
					<div class="card-body">
                    <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-4">
                            <a href="{{route('recebimento.index')}}"><img src="{{asset('app-assets/images/recebimento-materia-prima.png')}}" alt="Logo"></a>
                            </div>
                            <div class="col-md-5">
                            <a href="{{route('analise.index')}}"><img src="{{asset('app-assets/images/laboratorio.png')}}" alt="Logo"></a>
                            </div>


</div>
                    </div>
					</div>
				</div>

    
</div><!-- .animated -->
</div><!-- .content -->
<div class="clearfix"></div>
 
@include('footer')