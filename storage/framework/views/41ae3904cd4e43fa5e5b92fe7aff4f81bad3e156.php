<?php echo Form::open(['method'=>'GET','url'=>$url]); ?>

<input type="text" class="form-control" name="search" id="search_auto" placeholder="Search...">
<br>
<?php echo Form::button('Search', array('type' => 'submit','class' => 'btn btn-default')); ?>

<p></p>
<?php echo Form::close(); ?>



