<footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; Tecnologia da Informação - BO Paper 
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    
    
    <script src="{{url('https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/js/main.js')}}"></script>
      <script src="{{asset('app-assets/assets/js/jquery.js')}}"></script>
    <script src="{{asset('app-assets/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>

    <!--  Chart js -->
    <script src="{{url('https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js')}}"></script>

    <!--Chartist Chart-->
    <script src="{{url('https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js')}}"></script>

    <script src="{{url('https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js')}}"></script>

    <script src="{{url('https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/js/init/weather-init.js')}}"></script>

    <script src="{{url('https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/js/init/fullcalendar-init.js')}}"></script>


    <!--Local Stuff-->

   <!-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
  <script>
    $(document).ready( function () {
    $('#tabela').DataTable();
} );
</script>
<script>
            $("#tabela").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            }) </script>
</body>
</html>
