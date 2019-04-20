<li class=" <?php echo e($slot); ?> panel panel-default dropdown">
    <a data-toggle="collapse" href="#dropdown-table">
        <span class="<?php echo e($m_icon); ?>"></span><span class="title"><?php echo e($m_name); ?></span>
    </a>
    <!-- Dropdown-->
    <div id="dropdown-table" class="panel-collapse collapse">
        <div class="panel-body">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e($link); ?>">
                        <span class="<?php echo e($s_icon); ?>"></span><?php echo e($s_name); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Dropdown-->
</li>