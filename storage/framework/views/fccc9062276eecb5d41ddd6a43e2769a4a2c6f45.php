<div class="container clearfix">
    <div class="clear"></div>
    <ul class="secondary_menu">
        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
            <li><a href="<?php echo e(url('backend/admin')); ?>"><?php echo app('translator')->getFromJson('site.admin panel'); ?></a></li>
            <?php echo $__env->make('frontend.logout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('user')): ?>
            <li><a href="<?php echo e(url('backend/user')); ?>"><?php echo app('translator')->getFromJson('site.user panel'); ?></a></li>
            <?php echo $__env->make('frontend.logout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(url('login')); ?>"><?php echo app('translator')->getFromJson('site.my account'); ?></a></li>
            <li><a href="<?php echo e(url('auth/register')); ?>"><?php echo app('translator')->getFromJson('site.register'); ?></a></li>
        <?php endif; ?>

    </ul>
</div>

