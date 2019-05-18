
@extends('backend.master')
@section('content')
    <div>
	     <section class="content-header">
	      <h1>

	        <small>Aquí puedes ver los detalles del producto</small>

	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>
	        <li><a href="/backend/products/">Productos</a></li>
	        <li class="active">Detalles</li>
	      </ol>
	    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    {{$product[0]->brands->brand}}
                  </span>
            </li>

            <li>
              <i class="fa fa-envelope bg-aqua"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">Producto: <a href="{{ url('/') }}/{{$product[0]->category->cat}}/{{$product[0]->slug}}/{{$product[0]->id}}" target="_blank">{{$product[0]->name}}</a></h3>

                <div class="timeline-body">
          			{!! $product[0]->description !!}
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">{{$product[0]->category->cat}}</a>
                  <a class="btn btn-info btn-xs">{{$product[0]->price}} bs.</a>
                </div>
              </div>
            </li>

			<li>
              <i class="fa fa-info bg-green"></i>
              

				<div class="timeline-body">

			         <div class="row">
			         	<div class="col-md-3 col-1"></div>
			         	 <div class="col-md-6 col-10">
			         	 	<div class="row">
			         	 		<div class="col-md-6">			         	 
			         	 			<div class="info-box bg-yellow">
						         	 	 <span class="info-box-icon"><i class="fa  fa-archive"></i></span>
						         	 				         	
						         	 	 <div class="info-box-content">
						         	 	   <span class="info-box-text">Stock</span>
						         	 	   <span class="info-box-number">{{$product[0]->quantity}}</span>
						         	 				       

						         	 	 </div>
						         	 	 <!-- /.info-box-content -->
								       </div>
					   			</div>

			         	 		<div class="col-md-6">					         	 				         	
			         	 			<!-- /.info-box -->
						         	<div class="info-box bg-green">
						         	 	 <span class="info-box-icon"><i class="fa fa-money"></i></span>
						         	 				         	
						         	 	 <div class="info-box-content">
						         	 	   <span class="info-box-text">Precio</span>
						         	 	   <span class="info-box-number">{{$product[0]->price}} Bs.</span>
						         	 				         	
						         	 	 </div>
						         	 	 <!-- /.info-box-content -->
						       		</div>
					         	 	<!-- /.info-box -->
					         	</div>
			         	 		<div class="col-md-6">
			         	 			
				         	 		<div class="info-box bg-red">
						         	 	 <span class="info-box-icon"><i class="fa fa-tags"></i></span>
						         	 				         	
						         	 	 <div class="info-box-content">
						         	 	   <span class="info-box-text">Sub categoría</span>
						         	 	   <span class="info-box-number">{{$product[0]->category->cat}}</span>

						         	 	 </div>
						         	 	 <!-- /.info-box-content -->
						         	</div>		
			         	 		</div>
			         	 		<div class="col-md-6">

						         	 <!-- /.info-box -->
						       		<div class="info-box bg-aqua">
						         	 	 <span class="info-box-icon"><i class="fa fa-automobile"></i></span>
						         	 				         	
						         	 	 <div class="info-box-content">
						         	 	   <span class="info-box-text">Marca</span>
						         	 	   <span class="info-box-number">{{$product[0]->brands->brand}}</span>
						         	 				         	
						         	 	 </div>
						         	 </div>
				         	  <!-- /.info-box-content -->
			         			</div>

			         	 	</div>
			         	</div>

			         	<div class="col-md-3 col-1"></div>
			         </div>
          <!-- /.info-box -->

				</div>

			</li>

            <li>
              <i class="fa fa-camera bg-purple"></i>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">Imágenes del producto</a></h3>

                <div class="timeline-body" style="align-items: center; text-align: center;">
                  <img src="{{$product[0]->a_img}}" width="200" alt="Imagen 1" class="margin">
                  <img src="{{$product[0]->b_img}}" width="200" alt="Imagen 2" class="margin">
                  <img src="{{$product[0]->c_img}}" width="200" alt="Imagen 2" class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  	
    </div>


@endsection