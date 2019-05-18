@extends('backend.master')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos

        <small>Aquí puedes ver todas los productos. Selecciona el ícono <i class="fa fa-eye"></i> para ver los detalles.</small>

      </h1>
      <ol class="breadcrumb">

        <li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de productos</h3>
            </div>
            <!-- /.box-header -->

            <products :products="{{$products}}" :categories="{{$categories}}"></products>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection