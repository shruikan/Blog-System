<nav class="navbar navbar-default" role="navigation">
    <button type="button" id="btn-debug" class="btn btn-default navbar-btn">
        <i class="fa fa-bug"></i>
    </button>
    <ul class="nav navbar-nav">
        <li><a href="?p=dashboard">Dashboard</a></li>
        <li><a href="?p=pages">Pages</a></li>
        <li><a href="?p=users">Users</a></li>
        <li><a href="?p=navigation">Navigation</a></li>
        <li><a href="?p=settings">Settings</a></li>
    </ul>

    <?php include ('../' . D_TEMPLATE . '/user_panel.php'); ?>

</nav> <!-- END Main Nav -->
