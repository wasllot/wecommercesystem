<?php $__env->startSection('content'); ?>

    <!-- BREADCRUMBS -->
    <section class="breadcrumb <?php echo e($cats[$parent]['name']); ?> parallax margbot30">

        <!-- CONTAINER -->
        <div class="container">

            <h2><?php echo e($cats[$parent]['name']); ?></h2>

        </div>

        <!-- //CONTAINER -->

    </section>

    <!-- //BREADCRUMBS -->

    <section class="shop">
        
        <div class="container">

            <?php echo $__env->make('frontend/search', ['url'=>'/items/search/'.$cats[$parent]['id'].''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

    </section>

    <!-- SHOP BLOCK -->
    <section class="shop">

        <!-- CONTAINER -->
        <div class="container">

            <!-- ROW -->

            <div class="row">

                <!-- SIDEBAR -->
                <div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">

                    <?php echo $__env->make('frontend/shop_filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

                <!-- //SIDEBAR -->

                <!-- SHOP PRODUCTS -->

                <div class="col-lg-9 col-sm-9 padbot20">

                    <!-- SORTING TOVAR PANEL -->

                    <div class="sorting_options clearfix">

                        <div class="count_tovar_items">

                            <p><?php echo app('translator')->getFromJson('site.products'); ?></p>

                            <span>Items</span>

                        </div>

                        <!-- //COUNT TOVAR ITEMS -->

                    </div>

                    <!-- //SORTING TOVAR PANEL -->

                    <?php echo $__env->make('frontend/product_container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

                <!-- //SHOP PRODUCTS -->

            </div>

            <!-- //ROW -->

        </div>

        <!-- //CONTAINER -->

    </section>

<!-- //SHOP -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>