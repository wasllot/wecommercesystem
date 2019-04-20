<!-- ROW -->
<div class="row shop_block" id="ajaxproducts">
    <!-- TOVAR1 -->
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
                class="tovar_wrapper col-lg-4 col-md-6 col-12 padbot40">
            <div class="tovar_item clearfix">
                <div class="tovar_img">
                    <div class="tovar_img_wrapper">
                        <img class="img" src="<?php echo e(url('images/products')); ?>/<?php echo e($row->a_img); ?>" alt=""/>
                        <img class="img_h fancybox fancybox.ajax" href="<?php echo e(url('frame')); ?>/<?php echo e($row->id); ?>"
                             src="<?php echo e(url('images/products')); ?>/<?php echo e($row->a_img); ?>" alt=""/>
                    </div>
                    <div class="tovar_item_btns">
                        <a class="open-project tovar_view"
                           href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>">
                            <span><?php echo app('translator')->getFromJson('site.product'); ?></span> <?php echo app('translator')->getFromJson('site.view'); ?></a>
                        <?php if (\Illuminate\Support\Facades\Blade::check('user')): ?>
                        <a class="add_bag"
                           href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>">
                            <i class="fa fa-shopping-cart"></i></a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <a class="add_bag" href="<?php echo e(url('login')); ?>"><i class="fa fa-shopping-cart"></i></a>
                        <?php endif; ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                        <a class="add_bag" href="<?php echo e(url('backend/products')); ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tovar_description clearfix">
                    <a class="tovar_title"
                       href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>"><?php echo e($row->name); ?></a>
                    <span class="tovar_price"><?php echo Helper::price($row->price); ?>&nbsp Bss</span>
                </div>
                <div class="tovar_content"><?php echo e($row->description); ?></div>
            </div>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- //TOVAR1 -->
    <div class="clearfix">
        <!-- PAGINATION -->
    <?php echo $products->appends(Input::except('page'))->render(); ?>

    <!-- //PAGINATION -->
    </div>
    <hr>
</div>
<!-- //ROW -->