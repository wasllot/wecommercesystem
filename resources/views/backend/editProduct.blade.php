
@extends('backend.master')
@section('content')
    <div>
	     <section class="content-header">
	      <h1>

	        <small>Aquí puedes editar los productos</small>

	      </h1>
	      <ol class="breadcrumb">
	     
	        <li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>

	        <li><a href="/backend/products/">Productos</a></li>

	        <li class="active">Editar</li>

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

         	<product-edit :product="{{$product}}" :categories="{{$categories}}" :brands="{{$brands}}" ></product-edit>

          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  	
    </div>


@endsection