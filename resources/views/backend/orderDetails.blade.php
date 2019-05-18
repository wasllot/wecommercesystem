
@extends('backend.master')
@section('content')

    <!-- Content Header (Page header) -->

    <!-- @foreach($order as $o) -->
    <div>
	     <section class="content-header">
	      <h1>
	        Órdenes
	        @admin
	        	<small>Aquí puedes ver los detalles de la orden "{{$product[0]->name}}"</small>

	        @endadmin

	        @user
	        	<small>Aquí puedes ver los detalles de tu orden "{{$product[0]->name}}"</small>
	        @enduser

	      </h1>
	      <ol class="breadcrumb">
	       	@user
	       	<li><a href="backend/user"><i class="fa fa-dashboard"></i> Inicio</a></li>@enduser

	        @admin
	        <li><a href="backend/admin"><i class="fa fa-dashboard"></i> Inicio</a></li>@endadmin

	       	@user
	       	<li><a href="/backend/user-orders/">Órdenes</a></li>

	       	@enduser

	        @admin
	        <li><a href="/backend/orders/">Órdenes</a></li>
	        @endadmin


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
                    {{$order[0]->order_date}}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-aqua"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">Solicitó: <a href="{{ url('/') }}/{{$product[0]->category->cat}}/{{$product[0]->slug}}/{{$product[0]->id}}" target="_blank">{{$product[0]->name}}</a></h3>

                <div class="timeline-body">
          			{!! $product[0]->description !!}
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">{{$product[0]->category->cat}}</a>
                  <a class="btn btn-info btn-xs">{{$product[0]->price}} bs.</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->            
            <li>

              <i class="fa fa-question bg-green"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">{{Auth::user()->name}}, </a>Aquí puedes ver, de forma detallada los datos de tu orden</h3>

                <div class="timeline-body">
					 <section class="invoice">
					      <!-- title row -->
					      <div class="row">
					        <div class="col-xs-12">
					          <h2 class="page-header">
					            <i class="fa fa-globe"></i> Full Repuesto
					            <small class="pull-right">Fecha: {{$order[0]->order_date}}</small>
					          </h2>
					        </div>
					        <!-- /.col -->
					      </div>
					      <!-- info row -->
					      <div class="row invoice-info">
					        <div class="col-sm-4 invoice-col">
					          De
					          <address>
					            <strong>FullRepuesto.com</strong><br>
					            Av. Fuerzas Armadas, 25<br>
					            Barcelona, Anzoátegui<br>
					            Teléfono: (+58) 500 00 00<br>
					            Email: fullrepuestosve@gmail.com
					          </address>
					        </div>
					        <!-- /.col -->
					        <div class="col-sm-4 invoice-col">
					          Para:
					          <address>
					            <strong>{{$details[0]->name}}</strong><br>
					            {{$details[0]->address}}<br>
					            {{$details[0]->country}}<br>
					            <!-- Phone: (555) 539-1037<br> -->
					            Email: {{$details[0]->email}}
					          </address>
					        </div>
					        <!-- /.col -->
					        <div class="col-sm-4 invoice-col">
					          <b>{{$product[0]->slug}}</b><br>
					          <br>
					          <b>ID de la orden:</b> {{$order[0]->id}}<br>
					          <b>Fecha de pedido: </b> {{$order[0]->order_date}}<br>
					        </div>
					        <!-- /.col -->
					      </div>
					      <!-- /.row -->

					      <!-- Table row -->
					      <div class="row">
					        <div class="col-xs-12 table-responsive">
					          <table class="table table-striped">
					            <thead>
					            <tr>
					              <th>Qty</th>
					              <th>Producto</th>
					              <th>Imagen</th>
					              <th>Categoría</th>
					              <th>Precio</th>
					              <th>Subtotal</th>
					            </tr>
					            </thead>
					            <tbody>
					            <tr>
					              <td>{{$order[0]->quantity}}</td>
					              <td>{{$product[0]->name}}</td>
					              <td><img src="/images/products/{{$order[0]->img}}" height="25" width="25"></td>
					              <td>{{$product[0]->category->cat}}</td>
					              <td>{{$product[0]->price}}</td>
					              <td>{{$order[0]->amount}}</td>
					            </tr>
					            </tbody>
					          </table>
					        </div>
					        <!-- /.col -->
					      </div>
					      <!-- /.row -->

					      <div class="row">
					        <!-- accepted payments column -->
					        <div class="col-xs-6" style="align-items: center; text-align: center;">
					          <p class="lead">Método de pago: {{$payment[0]->method}}</p>
					          <img src="{{ url('images') }}/{{$payment[0]->img}}" width="100" alt="{{$payment[0]->method}}">

					          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
					            Este es el método que seleccionó en la compra. Sin embargo, puede modificarse.
					          </p>
					        </div>
					        <!-- /.col -->
					        <div class="col-xs-6">
					          <p class="lead">Fecha: {{$order[0]->order_date}}</p>

					          <div class="table-responsive">
					            <table class="table">
					              <tr>
					                <th style="width:50%">Subtotal:</th>
					                <td>{{$order[0]->amount}}</td>
					              </tr>
					              <tr>
					                <th>Impuestos</th>
					                <td>0</td>
					              </tr>
					              <tr>
					                <th>Envío ({{$shipping[0]->method}})</th>
					                <td>{{$shipping[0]->rate}}</td>
					              </tr>
					              <tr>
					                <th>Total:</th>
					                <td>{{$total}}</td>
					              </tr>
					            </table>
					          </div>
					        </div>
					        <!-- /.col -->
					      </div>
					      <!-- /.row -->

					    </section>
                </div>

              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
        
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">Imágenes del producto</a></h3>

                <div class="timeline-body" style="align-items: center; text-align: center;">
                  <img src="{{ url('images/products') }}/{{$product[0]->a_img}}" width="200" alt="Imagen 1" class="margin">
                  <img src="{{ url('images/products') }}/{{$product[0]->b_img}}" width="200" alt="Imagen 2" class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <!-- <i class="fa fa-video-camera bg-maroon"></i> -->
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">Puedes hablar con nosotros! </a></h3>



                <div class="timeline-body">
         <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">

            <div class="box-header with-border">

              <h3 class="box-title">{{$product[0]->name}} por: {{$details[0]->name}}</h3>

              <div class="box-tools pull-right">

                @admin

                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Participantes" data-widget="chat-pane-toggle">

                  <i class="fa fa-comments"></i>

                </button>

                @endadmin

              </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body" style="height: 60vh; overflow-y: scroll;">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">

                <chat-messages :conversation="{{ $details[0]->conversation_id }}" :user="{{ auth()->user() }}" ></chat-messages>
    
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">

                <ul class="contacts-list">

                  <li>

                      <conversation-participants :conversation="{{ $details[0]->conversation_id }}"></conversation-participants>

                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

              <chat-form :conversation="{{ $details[0]->conversation_id }}" :user="{{ auth()->user() }}"></chat-form>

            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
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
    <!-- @endforeach -->


@endsection