<li>
    <a href="<?php echo e(route('logout')); ?>"
       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        <?php echo app('translator')->getFromJson('site.logout'); ?>
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo e(csrf_field()); ?>

    </form>
</li>