<?php echo Form::open(['method' => 'GET', 'url' => 'search']); ?>


    <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 p-0 text-uppercase">

                    <input type="text" class="form-control search-slt" name="search" id="searchProduct" placeholder="PRODUCTO">

                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 p-0">

                    <select class="form-control search-slt text-uppercase" name="child">

                        <option selected disabled hidden><?php echo app('translator')->getFromJson('site.category'); ?></option>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option disabled class="font-weight-bold" ><?php echo e($parent->cat); ?></option>

                            <?php $__currentLoopData = $parent->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option style="font-size: 10px;" class="float-right" value="<?php echo e($child->cat_id); ?>" required> <?php echo e($child->cat); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-2 p-0">

					<?php echo Form::button('Buscar', array('type' => 'submit','class' => 'btn btn-default')); ?>


                </div>

            </div>

        </div>

        <div class="col-lg-2"></div>

    </div>

<?php echo Form::close(); ?>