<!DOCTYPE html>
<html>

<head>
    <title>Full repuesto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/AdminLTE.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/_all-skins.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-FileUpload.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >
        @include('backend.navbar')
        @include('backend.sidebar')


        <div class="content-wrapper" id="app">
           @include('messages.flash_message')


            @yield('content')

        </div>

            

        
    <!-- FOOTER -->
    @include('backend.footer')
            <!-- //FOOTER -->
            
</div>
    <script src="{{ asset('/js/jquery-alte.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/bootstrap-alte.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/fastclick.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/adminlte.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/bootstrap-FileUpload.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false,
          'language'    : {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

          }
        })
      })

    </script>

</body>

</html>