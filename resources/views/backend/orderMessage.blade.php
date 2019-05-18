@extends('backend.master')
@section('content')

@php
$conversationId = Request::query('conversation_id');

@endphp

    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Mensajería
        <small>Aquí puedes enviar y ver los mensajes sobre las ventas</small>
      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Mensajería</li>

      </ol>

      @include('messages.flash_message')


    </section>

    <!-- Main content -->
    <section class="content"> 

      <div class="col-md-6 col-lg-5 col-12">

        <!--chat list-->

       <ul id="chat-list">

          <!-- Messages: style can be found in dropdown.less-->
          <div class="messages-menu">

             <chat-conversations-order :user="{{ auth()->user() }}"></chat-conversations-order>

          </div>

        </ul>

      </div>

      <div class="col-md-6 col-lg-7 col-12">

        @if($conversationId)

            @php

              $data = Chat::conversations()->getById($conversationId)->data;

            @endphp

         <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">

            <div class="box-header with-border">

              <h3 class="box-title">{{$data}}</h3>

              <div class="box-tools pull-right">

                @admin

                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Participantes" data-widget="chat-pane-toggle">

                  <i class="fa fa-comments"></i>

                </button>

                @endadmin

              </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body" style="min-height: 50vh; max-height: 100vh;">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">

                <chat-messages :conversation="{{ $conversationId }}" :user="{{ auth()->user() }}" ></chat-messages>
    
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">

                <ul class="contacts-list">

                  <li>

                      <conversation-participants :conversation="{{ $conversationId }}"></conversation-participants>

                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

              <chat-form :conversation="{{ $conversationId }}" :user="{{ auth()->user() }}"></chat-form>

            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->

        @endif

        @if(!$conversationId)

          <div style="height: 87vh; display: flex; align-items: center; justify-content: center;">

            <h3 style="text-align: center;">Selecciona una conversación</h3>

            <i class="fa fa-envelope fa-3x" style="padding: 0.5rem;"></i>

          </div>


        @endif

      </div>

    </section>
<!-- 
<div id="app">

	<div class="container" style="margin-top: 8rem; padding: 2rem 2rem 2rem 2rem;">

	    <div class="row container-fluid justify-content-center">

	    	<div class="col-md-1"></div>

	        <div class="col-md-3 col-xs-12 chat_sidebar">

	          <chat-conversations-order :user="{{ auth()->user() }}"></chat-conversations-order>

	        </div>

	        <div class="col-md-8 col-xs-12">

		       <div class="row container-fluid panel panel-default">

				 <div>

					@if($conversationId)

						@php

							$data = Chat::conversations()->getById($conversationId)->data;

						@endphp

							<div class="chat-bottom-bar" style="padding: 1rem; text-align: center; color: white !important;">

								<h3>{{$data}}</h3>

							</div>

					        <div class="msg-container">
					        	
					        	<div>

					        		<chat-messages :conversation="{{ $conversationId }}" :user="{{ auth()->user() }}" ></chat-messages>

					      		</div>

					        </div>

					        <div class="chat-bottom-bar">

				      			<chat-form :conversation="{{ $conversationId }}" :user="{{ auth()->user() }}"></chat-form>
					      			
					      	</div>
					@endif

					@if(!$conversationId)

						<div style="height: 87vh; display: flex; align-items: center; justify-content: center;">

							<h3 style="text-align: center;">Selecciona una conversación</h3>

							<i class="fa fa-envelope fa-3x" style="padding: 0.5rem;"></i>

						</div>

					@endif

		       	 </div>        	

	       	 	</div>

	    	</div>


		</div>

	</div>

</div> -->

@endsection