<!-- CLEARFIX -->
<div class="clearfix padbot40">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="tovar_view_fotos clearfix">
                <div id="slider2" class="flexslider">
                    <ul class="slides">
                        <li><a><img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->a_img); ?>" alt=""/></a></li>
                        <li><a><img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->b_img); ?>" alt=""/></a></li>
                        <li><a><img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->c_img); ?>" alt=""/></a></li>
                    </ul>
                </div>
                <div id="carousel2" class="flexslider">
                    <ul class="slides">
                        <li><a href="javascript:void(0);">
                                <img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->a_img); ?>" alt=""/></a></li>
                        <li><a href="javascript:void(0);">
                                <img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->b_img); ?>" alt=""/></a></li>
                        <li><a href="javascript:void(0);">
                                <img src="<?php echo e(url('images/products')); ?>/<?php echo e($item->c_img); ?>" alt=""/></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="tovar_view_description px-2">
                <div class="tovar_view_title"><?php echo e($item->name); ?></div>
                <div class="clearfix tovar_brend_price">
                    <div class="pull-left tovar_brend"><?php echo e($item->brand); ?></div>
                    <div class="pull-right tovar_view_price">
                        <?php echo Helper::price($item->price); ?>&nbsp BsS
                    </div>
                </div>

                <div class="tovar-color-select">
                    <h4><?php echo app('translator')->getFromJson('site.rate the product'); ?></h4>
                    <div class="pb-4 float-center">
                        <star-rating :rating="4.67" :round-start-rating="false"></star-rating>
                        
                    </div>
                </div>
                <div class="tovar_view_btn">
                    <?php echo Form::open(['url' => 'cart/store']); ?>


                    <input type="text" name="qty" value="QTY" id=""
                           maxlength="3" size="50" style="width: 20%"
                           onFocus="if (this.value == 'QTY') this.value = '';"
                           onBlur="if (this.value == '') this.value = 'QTY';"/>

                    <div class="tovar_view_btn">
                        <?php echo $__env->make('errors.error_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <a class="add_bag" href="<?php echo e(url('backend/products')); ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <a class="add_bag" href="<?php echo e(url('login')); ?>">
                                <i class="fa fa-shopping-cart"></i><?php echo app('translator')->getFromJson('site.add to bag'); ?></a>
                        <?php endif; ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('user')): ?>
                            <?php echo Form::hidden('id', $item->id); ?>

                            <?php echo Form::hidden('name', $item->name); ?>

                            <?php echo Form::hidden('price', $item->price); ?>

                            <?php echo Form::hidden('img', $item->a_img); ?>

                            <?php echo Form::submit('Añadir al carrito', ['class' => 'add_bag']); ?>

                            <?php echo Form::close(); ?>

                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>
<!-- //CLEARFIX -->