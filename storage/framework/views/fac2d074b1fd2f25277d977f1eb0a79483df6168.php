<!DOCTYPE html>
<html>

<head>
    <title>Full repuesto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/font-awesome/css/font-awesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/animate.css')); ?>">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/style-backend.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/flat-blue.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/backend.css')); ?>">

    <!-- SCRIPTS -->
    <script src="<?php echo e(asset('/js/jquery.min.js')); ?>" type="text/javascript"></script>
    <?php echo Rapyd::styles(false); ?>

    <?php echo Rapyd::head(); ?>


</head>

<body class="flat-blue">
<div class="app-container" >
    <div class="row content-container" >
        <?php echo $__env->make('backend.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('backend.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="preloader">
            <img src="<?php echo e(url('images/preloader.gif')); ?>" alt=""/>
        </div>
        <div class="preloader_hide" id="app">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        
    </div>
    <!-- FOOTER -->
    <?php echo $__env->make('backend.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- //FOOTER -->
    <script src="<?php echo e(asset('/js/app.js')); ?>" type="text/javascript"></script>
            
</div>
</body>

</html>
