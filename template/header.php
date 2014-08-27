<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <?php if ($debug_status == 1 && $user['level'] == 3): ?>
        <button type="button" id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
    <?php endif; ?>

    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?= SITE; ?>" class="navbar-brand"><?= $site_title; ?></a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <form role="search" method="post" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav">
                <?php
                $navigation = main_nav($dbc, $path);

                foreach ($navigation as $nav) {
                    ?>
                    <li <?php selected($url, $nav['url'], 'class="active"'); ?>><a href="<?= SITE . $nav['url']; ?>"><?= $nav['label']; ?></a></li>
                <?php } ?>
            </ul>
            <?php require (D_TEMPLATE . 'user_panel.php'); ?>
        </nav>
    </div>
</header>
<div class="container" id="content">

    <!--    TODO: Implement-->
    <div id="search-output"></div>

    <?php
    require (D_TEMPLATE . 'messages.php');