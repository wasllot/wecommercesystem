@extends('backend.master')
@section('content')

<div id="app">
	<div class="container" style="margin-top: 8rem; padding: 2rem 0rem 2rem 0rem;">
	    <div class="row container-fluid justify-content-center">
	    	<div class="col-md-3"></div>

	        <div class="col-md-1 col-xs-12">
		       <div class="row container-fluid panel panel-default">
				    <div class="">

							<div class="chat-bottom-bar" style="padding: 1rem; text-align: center; color: white !important;">
								<h3>{{$data}}</h3> <p class="float-left"><a href="backend/user-messages">Volver</a></p>
							</div>

					        <div class="msg-container col-md-12 col-xs-12">
					        	
					        	<div class="col-md-12 col-xs-12">

					        		<chat-messages :conversation=conversation :user="{{ auth()->user() }}" ></chat-messages>
					      		</div>
		        
					        </div>

						   	<div class="chat-bottom-bar">
				      			<chat-form :conversation=conversation :user="{{ auth()->user() }}"></chat-form>
					      			
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

	   		 <div class="col-md-2"></div>
	    </div>
	</div>
</div>

@endsection