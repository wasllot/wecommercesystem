<h3><?php echo app('translator')->getFromJson('site.by price'); ?></h3>
<?php if(Request::input('price')=='asc'): ?>
    <h4><b><a style="color:#5fba7d" href="#" id="priceasc">Ascendiente</a></b></h4>
<?php else: ?>
    <h4><a href="#" id="priceasc">Ascendiente</a></h4>
<?php endif; ?>
<?php if(Request::input('price')=='desc'): ?>
    <h4><b><a style="color:#5fba7d" href="#" id="pricedesc">Descendiente</a></b></h4>
<?php else: ?>
    <h4><a href="#" id="pricedesc">Descendiente</a></h4>
<?php endif; ?>

<h3><?php echo app('translator')->getFromJson('site.by name'); ?></h3>

<?php if(Request::input('name')=='asc'): ?>
    <h4><b><a style="color:#5fba7d" href="#" id="nameasc">Ascendiente</a></b></h4>
<?php else: ?>
    <h4><a href="#" id="nameasc">Ascendiente</a></h4>
<?php endif; ?>
<?php if(Request::input('name')=='desc'): ?>
    <h4><b><a style="color:#5fba7d" href="#" id="namedesc">Descendiente</a></b></h4>
<?php else: ?>
    <h4><a href="#" id="namedesc">Descendiente</a></h4>
<?php endif; ?>