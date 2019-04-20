<header>

    <!-- TOP INFO -->
    <div class="top_info">

        <!-- CONTAINER -->
    <?php echo $__env->make('partials/user_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- //CONTAINER -->
    </div>
    <!-- TOP INFO -->

    <!-- MENU BLOCK -->
    <div class="menu_block">

        <!-- CONTAINER -->
        <div class="container clearfix">
        <a href="javascript:void(0);" class="menu_toggler"><i class="fa fa-align-justify"></i></a>
        <?php if(!Auth::check()): ?>
        <?php else: ?>
            <!-- SHOPPING BAG -->
                <?php if($cart->first() == ''): ?>
                    <div class="shopping_bag">
                        <a class="shopping_bag_btn" href="javascript:void(0);"><i class="fa fa-shopping-cart"></i>

                            <p><?php echo app('translator')->getFromJson('site.shopping bag'); ?></p><span><?php echo e($rows); ?></span></a>

                        <div class="cart">
                            <ul class="cart-items">
                                <li class="clearfix"><span
                                            class="cart_item_price"><?php echo app('translator')->getFromJson('site.shopping bag message'); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                <!-- //SHOPPING BAG -->
                    <!-- SHOPPING BAG -->
                    <div class="shopping_bag">
                        <a class="shopping_bag_btn" href="javascript:void(0);"><i class="fa fa-shopping-cart"></i>

                            <p><?php echo app('translator')->getFromJson('site.shopping bag'); ?></p>
                            <span><?php echo e($rows); ?></span></a>

                        <div class="cart">
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul class="cart-items">
                                    <li class="clearfix">
                                        <img class="cart_item_product"
                                             src="<?php echo e(url('images/products')); ?>/<?php echo e($item->options->img); ?>" alt=""/>
                                        <a href="<?php echo e(url('cart')); ?>" class="cart_item_title"><?php echo e($item->name); ?></a>
                                        <span class="cart_item_price"><?php echo e($item->qty); ?>

                                            x<?php echo Helper::price($item->price); ?>&nbsp<?php echo $currency; ?></span>
                                    </li>
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="cart_total">
                                <div class="clearfix">
										<span class="cart_subtotal"><?php echo app('translator')->getFromJson('site.bag subtotal'); ?>
                                            <b><?php echo Helper::price($grand_total); ?>

                                                &nbsp<?php echo $currency; ?></b></span>
                                </div>
                                <a class="btn active"
                                   href="<?php echo e(url('checkout/shipping')); ?>"><?php echo app('translator')->getFromJson('site.checkout'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <!-- //SHOPPING BAG -->
            <?php endif; ?>
            <?php echo $__env->make('partials/menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- //CONTAINER -->
    </div>
    <!-- //MENU BLOCK -->
</header>