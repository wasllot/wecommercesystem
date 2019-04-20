<!-- SHOP FILTER -->
<div class="sidepanel widget_sizes">
    <h3><?php echo app('translator')->getFromJson('site.by cats'); ?></h3>

    <form class="login_form" name="pr_cat" id="categories" role="form"
          method="GET" action="<?php echo e(url('filter/products/'.$cats[$parent]['id'].'')); ?>">

        <?php $__currentLoopData = $cats[$parent]['sub_cat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="checkbox" id="<?php echo e($row['name']); ?>" name="categ[]" value="<?php echo e($row['id']); ?>"
                    <?php echo e((in_array($row['id'],$category))?'checked="checked"':''); ?> />
            <label for="<?php echo e($row['name']); ?>">
                <li><a><?php echo e($row['name']); ?></a></li>
            </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="sidepanel widget_brands">

            <?php echo $__env->make('frontend.sorting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

        <div class="sidepanel widget_brands">

            <h3><?php echo app('translator')->getFromJson('site.by brands'); ?></h3>
            <?php $__currentLoopData = $properties['brand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="checkbox" id="<?php echo e($row->brand); ?>" name="brand[]" value="<?php echo e($row->brand_id); ?>"
                        <?php echo e((in_array($row->brand_id, $brand)) ? 'checked="checked"' : ''); ?>/>
                <label for="<?php echo e($row->brand); ?>"><?php echo e($row->brand); ?>

                    <?php if($row->brandCount): ?>
                        <span>(<?php echo e($row->brandCount->aggregate); ?>)</span>
                    <?php else: ?>
                        <span>Out of Stock</span>
                    <?php endif; ?>
                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <input type="submit" value="Submit" class="submit">
    </form>
</div>
<!-- //SHOP FILTER -->