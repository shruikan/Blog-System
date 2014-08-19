<nav class="navbar navbar-default" role="navigation">
    <button type="button" id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
    <div class="container">
        <ul class="nav navbar-nav">
            <?php main_nav($dbc); ?>
        </ul>

        <?php include (D_TEMPLATE . '/user_panel.php'); ?>

    </div>
</nav>