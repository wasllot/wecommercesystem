<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <div class="icon fa fa-paper-plane"></div>
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                        <div class="title">Menu Backend</div>
                    <?php endif; ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('user')): ?>
                        <div class="title">User Menu</div>
                    <?php endif; ?>
                </a>
                <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">
                <?php echo $__env->make('backend.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
<script>
    $(function () {
        var url = window.location.href;
        console.log(url)
        $('a[href="' + url + '"]').parent('ul .menu').addClass('active');
        //$('a[href="'+url+'"]').addClass('active');
    });
</script>
