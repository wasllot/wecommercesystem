<!-- TOVAR -->
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 col-md-3 col-6 padbot40">
        <div class="tovar_item">
            <div class="tovar_img">
                <div class="tovar_img_wrapper">
                    <img class="img" src="<?php echo e(url('images/products')); ?>/<?php echo e($row->a_img); ?>" alt=""/>
                    <img class="img_h fancybox fancybox.ajax img-fluid" href="<?php echo e(url('frame')); ?>/<?php echo e($row->id); ?>"
                         src="<?php echo e(url('images/products')); ?>/<?php echo e($row->b_img); ?>" alt=""/>
                </div>
                <div class="tovar_item_btns d-flex mx-2">
                    <a class="open-project tovar_view"
                       href="<?php echo e(url('/')); ?>/<?php echo e($row->category->cat); ?>/<?php echo e($row->slug); ?>/<?php echo e($row->id); ?>">
                        <span><?php echo app('translator')->getFromJson('site.product view'); ?></span></a>
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
                <span class="tovar_price"><?php echo Helper::price($row->price); ?>&nbspBsS</span>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- //TOVAR -->