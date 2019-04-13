@extends('backend.master')
@section('content')

@php
$conversationId = Request::query('conversation_id');


@endphp

<div id="app">
	<div class="container" style="margin-top: 8rem; padding: 2rem 0rem 2rem 0rem;">
	    <div class="row container-fluid justify-content-center">
	    	<div class="col-md-1"></div>
	        <div class="col-md-3 col-xs-12 chat_sidebar">
	          <chat-conversations :user="{{ auth()->user() }}"></chat-conversations>
	        </div>
	        <div class="col-md-6 col-xs-12">
		       <div class="row container-fluid panel panel-default">

	        	<!-- <div class="panel-heading">Conversación #{{ $conversationId }}</div> -->

				    <div class="">
						@if($conversationId)

						@php
							$data = Chat::conversations()->getById($conversationId)->data;
						@endphp
							<div class="chat-bottom-bar" style="padding: 1rem; text-align: center; color: white !important;">
								<h3>{{$data}}</h3>
							</div>
					        <div class="msg-container col-md-12 col-xs-12">
					        	
					        	<div class="col-md-12 col-xs-12">
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

		      <div class="col-md-2 col-xs-12">
		          <h3>Participantes</h3>
		          @if($conversationId)
		               <div class="member_list">

			              <ul class="list-unstyled">

		         			 <conversation-participants :conversation="{{ $conversationId }}"></conversation-participants>

			              </ul>

			            </div>

		          @endif
		      </div>
	    </div>
	</div>
</div>

@endsection