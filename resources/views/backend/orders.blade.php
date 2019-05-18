@extends('backend.master')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Órdenes
        @user
        <small>Selecciona el icono <i class="fa fa-eye"></i> para ver los detalles de tu orden y contactar a la plataforma</small>
        @enduser

        @admin
        <small>Aquí puedes ver todas las órdedes. Selecciona el ícono <i class="fa fa-eye"></i> para ver los detalles y comunicarte con los clientes</small>
        @endadmin
      </h1>
      <ol class="breadcrumb">
        @user<li><a href="backend/user"><i class="fa fa-dashboard"></i> Inicio</a></li>@enduser
        @admin<li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>@endadmin

        <li class="active">Órdenes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            @admin
              <h3 class="box-title">Órdenes de tus clientes</h3>
            @endadmin
            @user
              <h3 class="box-title">Mis órdenes</h3>
            @enduser

            </div>
            <!-- /.box-header -->
        		<orders-user :orders="{{$orders}}"></orders-user>
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