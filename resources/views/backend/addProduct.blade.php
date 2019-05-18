
@extends('backend.master')
@section('content')
    <div>
	     <section class="content-header">
	      <h1>

	        <small>Aquí puedes añadir productos nuevos</small>

	      </h1>
	      <ol class="breadcrumb">
	     
	        <li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>

	        <li><a href="/backend/products/">Productos</a></li>

	        <li class="active">Añadir producto</li>

	      </ol>
        
	    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">

        <div class="col-md-12">

           <div class="box box-warning">

            <div class="box-header with-border">

              <h3 class="box-title">Datos del producto</h3>

            </div>
            <!-- /.box-header -->

         	<add-article :categories="{{$categories}}" :brands="{{$brands}}"></add-article>

          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  	
    </div>


@endsection