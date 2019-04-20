<!--MENU -->
<ul class="nav-menu center" >

    <li class="normal menu"><a href="<?php echo e(url('fullrepuesto')); ?>"><?php echo app('translator')->getFromJson('site.home'); ?></a>
        <!-- MEGA MENU -->
    </li>
    <!-- //MEGA MENU -->
    <!-- MEGA MENU-->
    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="sub-menu"><a><?php echo e($parent->cat); ?></a>
            <ul class="mega_menu megamenu_col1 clearfix">
                <li class="col">
                    <?php $__currentLoopData = $parent->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ol>
                            <li>
                                <a href="<?php echo e(url('')); ?>/<?php echo e($parent->cat); ?>/<?php echo e($child->cat); ?>/<?php echo e($child->parent_id); ?>?categ[]=<?php echo e($child->cat_id); ?>">
                                    <?php echo e($child->cat); ?></a>
                            </li>
                        </ol>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
            </ul>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- //MEGA MENU -->
    <!-- MEGA MENU -->

    <!-- //MEGA MENU -->
    <!-- <li class="last sale_menu"><a href="<?php echo e(url('eshop')); ?>"><?php echo app('translator')->getFromJson('site.sale'); ?></a></li> -->
    <li class="normal menu"><a href="<?php echo e(url('contacts')); ?>"><?php echo app('translator')->getFromJson('site.contacts'); ?></a>
    <li class="normal menu"><a href="<?php echo e(url('aboutus')); ?>"><?php echo app('translator')->getFromJson('site.about us'); ?></a>
    <!-- <li class="normal menu"><a href="<?php echo e(url('login')); ?>"><?php echo app('translator')->getFromJson('site.login'); ?></a> -->
<!--     <li class="sub-menu"><a><?php echo $currency; ?></a>
        <ul class="mega_menu megamenu_col1 clearfix">
            <li class="col">
                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ol>
                        <li><a href="<?php echo e(url('currency')); ?>/<?php echo e($row->name); ?>">
                                <?php echo e($row->name); ?></a></li>
                    </ol>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </li>
        </ul>
    </li> -->
    <li class="sub-menu"><a><?php echo e($locale); ?></a>
        <ul class="mega_menu megamenu_col1 clearfix">
            <li class="col">
                <ol><li><a href="<?php echo e(url('locale')); ?>/en">en</a></li></ol>
                <ol><li><a href="<?php echo e(url('locale')); ?>/es">es</a></li></ol>
            </li>
        </ul>
    </li>
</ul>
<!-- //MENU-->