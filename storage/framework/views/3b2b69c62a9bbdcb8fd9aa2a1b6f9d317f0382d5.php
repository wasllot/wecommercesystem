<?php $__env->startSection('content'); ?>
        <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title" style="text-align: center;">Preguntas</span>
            <?php echo $__env->make('messages.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <div id="app">
            <example></example>
            <!-- <star-rating :rating="4.67" :round-start-rating="false"></star-rating> -->

        </div>

    </div>
</div>
<!-- End Main Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>