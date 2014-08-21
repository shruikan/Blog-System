<nav class="navbar navbar-default" role="navigation">
    <?php if ($debug_status == 1) { ?>
        <button type="button" id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
    <?php } ?>
        
    <div class="container">
        <ul class="nav navbar-nav">
            <?php main_nav($dbc, $path); ?>
        </ul>

        <?php include (D_TEMPLATE . '/user_panel.php'); ?>

    </div>
</nav>