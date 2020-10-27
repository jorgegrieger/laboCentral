<!doctype html>

<html class="" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laboratório Central</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css')}}">
  
    <link rel="stylesheet" href="{{asset('app-assets/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/assets/css/style.css')}}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
    <link href="{{url('https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/public/app-assets/js/jquery.js')}}"></script>
    <link href="{{url('https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{url('https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css')}}" rel="stylesheet" />
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js')}}"></script>
    <link type="text/css" href="css/custom-theme/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>


   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('home')}}"><i class="menu-icon fa fa-home"></i>Pagina Inicial </a>
                    </li>
                    <li class="menu-title">Recebimento de Matéria Prima</li><!-- /.menu-title -->
                    <li>
                        <a href="{{route('recebimento.index')}}"><i class="menu-icon fa fa-truck"></i>Cadastrar Matéria Prima</a>
                    </li>
                    <li class="menu-title">Laboratório Químico</li><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Cadastros</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-genderless"></i><a href="{{route('produto.index')}}">Produtos</a></li>
                            <li><i class="menu-icon fa fa-genderless"></i><a href="{{route('fornecedor.index')}}">Fornecedores</a></li>
                            <li><i class="menu-icon fa fa-genderless"></i><a href="{{route('analista.index')}}">Analistas</a></li>
                        </ul>
                    </li>
                    <li>
                         <a href=""><i class="menu-icon fa fa-building"></i>Relatórios</a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon fa fa-unlock"></i>Liberação</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{asset('app-assets/images/logo copiar.jpg')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{asset('app-assets/images/logo copiar.jpg')}}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>


                        
                    </header>
