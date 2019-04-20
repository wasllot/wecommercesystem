<?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/admin')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-tachometer <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Dashboard <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/articles')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-pencil-square-o <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Custom Table <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/users')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-user <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Usuarios <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/orders')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-shopping-cart <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Órdenes <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/questions')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-question <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Preguntas <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>    
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/messages')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-envelope <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Mensajes <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/brands')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-th-large <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Marcas <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/category')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-list <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Categorías <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/subcategory')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-list-alt <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Subcategorías <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>    
    <?php $__env->startComponent('backend.dropdown'); ?>
    <?php echo Helper::setActive('products'); ?>

    <?php $__env->slot('link'); ?><?php echo e(url('backend/products')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('m_icon'); ?>icon fa fa-table <?php $__env->endSlot(); ?>
    <?php $__env->slot('m_name'); ?>Catálogo <?php $__env->endSlot(); ?>
    <?php $__env->slot('s_icon'); ?>icon fa fa-pencil-square-o <?php $__env->endSlot(); ?>
    <?php $__env->slot('s_name'); ?>Editar productos <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (\Illuminate\Support\Facades\Blade::check('user')): ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/user')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-tachometer <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Panel de usuario <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/profile')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-eye <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Perfil <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/user-orders')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-money <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Mis órdenes <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>    
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/user-messages')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-envelope <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Mensajes <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>    
    <?php $__env->startComponent('backend.link'); ?>
    <?php $__env->slot('link'); ?><?php echo e(url('backend/my-questions')); ?><?php $__env->endSlot(); ?>
    <?php $__env->slot('icon'); ?>icon fa fa-question <?php $__env->endSlot(); ?>
    <?php $__env->slot('name'); ?>Mis preguntas <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>