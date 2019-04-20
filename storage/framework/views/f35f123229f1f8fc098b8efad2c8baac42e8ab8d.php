<?php $__env->startSection('content'); ?>

<?php
$conversationId = Request::query('conversation_id');

?>

<div id="app">

	<div class="container" style="margin-top: 8rem; padding: 2rem 2rem 2rem 2rem;">

	    <div class="row container-fluid justify-content-center">

	    	<div class="col-md-1"></div>

	        <div class="col-md-3 col-xs-12 chat_sidebar">

	          <chat-conversations-order :user="<?php echo e(auth()->user()); ?>"></chat-conversations-order>

	        </div>

	        <div class="col-md-8 col-xs-12">

		       <div class="row container-fluid panel panel-default">

				 <div>

					<?php if($conversationId): ?>

						<?php

							$data = Chat::conversations()->getById($conversationId)->data;

						?>

							<div class="chat-bottom-bar" style="padding: 1rem; text-align: center; color: white !important;">

								<h3><?php echo e($data); ?></h3>

							</div>

					        <div class="msg-container">
					        	
					        	<div>

					        		<chat-messages :conversation="<?php echo e($conversationId); ?>" :user="<?php echo e(auth()->user()); ?>" ></chat-messages>

					      		</div>

					        </div>

					        <div class="chat-bottom-bar">

				      			<chat-form :conversation="<?php echo e($conversationId); ?>" :user="<?php echo e(auth()->user()); ?>"></chat-form>
					      			
					      	</div>
					<?php endif; ?>

					<?php if(!$conversationId): ?>

						<div style="height: 87vh; display: flex; align-items: center; justify-content: center;">

							<h3 style="text-align: center;">Selecciona una conversación</h3>

							<i class="fa fa-envelope fa-3x" style="padding: 0.5rem;"></i>

						</div>

					<?php endif; ?>

		       	 </div>        	

	       	 	</div>

	    	</div>


		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>