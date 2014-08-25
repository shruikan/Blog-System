<nav class="navbar navbar-default" role="navigation">
    <?php if ($debug_status == 1) { ?>
        <div class=" pull-right">
            <button type="button" id="btn-debug" class="btn btn-default navbar-btn">
                <i class="fa fa-bug"></i>
            </button>
        </div>
    <div class="navbar-btn pull-right"><?= $_SESSION['username']; ?> [<a href="?p=logout">logout</a>]</div>
    <?php } ?>

    <ul class="nav navbar-nav">
        <li><a href="?p=posts">Posts</a></li>
        <li><a href="?p=users">Users</a></li>
        <li><a href="?p=navigation">Navigation</a></li>
        <li><a href="?p=settings">Settings</a></li>
        <li class="pull-right"></li>
    </ul>

</nav> <!-- END Main Nav -->