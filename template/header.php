<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <?php if ($debug_status == 1) { ?>
        <button type="button" id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
    <?php } ?>

    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><?php echo $site_title; ?></a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav">
                <?php main_nav($dbc, $path); ?>
            </ul>
            <?php include (D_TEMPLATE . '/user_panel.php'); ?>
        </nav>
    </div>
</header>
<div class="container">
<!--TODO FIX-->