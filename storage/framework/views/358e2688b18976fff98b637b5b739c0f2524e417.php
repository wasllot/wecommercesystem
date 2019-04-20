<?php $__env->startSection('content'); ?>
    <!-- BREADCRUMBS -->
    <section class="breadcrumb parallax margbot30"></section>
    <!-- //BREADCRUMBS -->

    <div class="px-3">
        <!-- TOVAR DETAILS -->
        <section class="tovar_details" id="app">
    
            <!-- CONTAINER -->
            <div class="container-fluid">
    
                <!-- ROW -->
                <div class="row">
    
                    <!-- SIDEBAR TOVAR DETAILS -->
                    <div class="col-lg-3 col-md-2 sidebar_tovar_details">
                        <h3>
                            <b><?php echo app('translator')->getFromJson('site.other'); ?></b>
                        </h3>
                        <ul class="tovar_items_small clearfix">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="clearfix">
                                    <img class="tovar_item_small_img"
                                         src="<?php echo e(url('images/products')); ?>/<?php echo e($row->a_img); ?>" alt=""/>
                                    <a href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>"
                                       class="tovar_item_small_title"><?php echo $row->name;?></a>
                                    <span class="tovar_item_small_price">
                                    <?php echo Helper::price($row->price); ?>&nbsp BsS
                                </span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!-- //SIDEBAR TOVAR DETAILS -->
    
                    <!-- TOVAR DETAILS WRAPPER -->
                    <div class="col-lg-9 col-md-10 col-12 tovar_details_wrapper clearfix">
                        <div class="tovar_details_header clearfix margbot35">
                            <h3 class="pull-left">
                                <b>
                                    <a href="<?php echo e(url('catalog')); ?>/<?php echo e($item->category->cat); ?>/<?php echo e($item->parent_id); ?>?categ=<?php echo e($item->cat_id); ?>"><?php echo e($item->category->cat); ?></a>
                                </b>
                            </h3>
                        </div>
                    <?php echo $__env->make('frontend.clearfix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- TOVAR INFORMATION -->
                        <div class="tovar_information">
                            <div class="card mb-4 bg-info">
                                <h2 class="text-center pt-4 text-white"><?php echo app('translator')->getFromJson('site.description'); ?></h2>
                            </div>
                                <?php echo $__env->make('partials/box_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <!-- //TOVAR INFORMATION -->
                    </div>
                    <!-- //TOVAR DETAILS WRAPPER -->
                </div>
                <!-- //ROW -->
            </div>
            <!-- //CONTAINER -->
        </section>
        <!-- //TOVAR DETAILS -->
    
        <section class="container">
            
             <questions  :product="<?php echo e($item); ?>" :user="<?php echo e(json_encode(Auth::user())); ?>"></questions>
    
           
        </section>
    
    
        <!-- BANNER SECTION -->
    <!--     <section class="banner_section">
    
            <div class="container">
    
                <div class="row">
    
                    <div class="banner_wrapper">
                        <div class="col-lg-9 col-md-9">
                            <a class="banner type4 margbot40" href="javascript:void(0);">
                                <img src="<?php echo e(url('images/tovar')); ?>/banner4.jpg" alt=""/></a>
                        </div>
    
                        <div class="col-lg-3 col-md-3"><a class="banner nobord margbot40" href="javascript:void(0);">
                                <img src="<?php echo e(url('images/tovar')); ?>/banner5.jpg" alt=""/></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    
    
        <!-- NEW ARRIVALS -->
        <section class="new_arrivals padbot50 mt-4">
    
            <!-- CONTAINER -->
            <div class="container">
                <h2><?php echo app('translator')->getFromJson('site.arrivals'); ?></h2>
    
                <!-- JCAROUSEL -->
                <div class="jcarousel-wrapper">
    
                    <div class="jcarousel">
                        <ul>
                            <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <!-- TOVAR -->
                                    <div class="tovar_item_new">
                                        <div class="tovar_img">
                                            <img src="<?php echo e(url('images/products')); ?>/<?php echo e($row->a_img); ?>" alt=""/>
                                            <a class="open-project tovar_view"
                                               href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>"><?= _('quick view')?></a>
                                        </div>
                                        <div class="tovar_description clearfix">
                                            <a class="tovar_title"
                                               href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>"><?php echo e($row->name); ?></a>
                                            <span class="tovar_price"><?php echo Helper::price($row->price); ?>

                                                &nbsp BsS</span>
                                        </div>
                                    </div>
                                    <!-- //TOVAR -->
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <!-- //JCAROUSEL -->
            </div>
            <!-- //CONTAINER -->
        </section>
        <!-- //NEW ARRIVALS -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>