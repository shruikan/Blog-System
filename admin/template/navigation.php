<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-btn pull-right"><?= $_SESSION['username']; ?> [<a href="?p=logout">logout</a>]</div>

    <ul class="nav navbar-nav">
        <li><a href="<?= ROOT; ?>"><i class="fa fa-chevron-left"></i> Home Page</a></li>
        <li><a href="?p=posts">Posts</a></li>
        <li><a href="?p=users">Users</a></li>
        <li><a href="?p=navigation">Navigation</a></li>
        <li><a href="?p=settings">Settings</a></li>
        <li class="pull-right"></li>
    </ul>

    <?php if ($debug_status == 1): ?>
        <div class="navbar-btn">
            <button type="button" id="btn-debug" class="btn btn-default">
                <i class="fa fa-bug"></i>
            </button>
        </div>
    <?php endif; ?>
</nav> <!-- END Main Nav -->
<?php
include (D_TEMPLATE . '/messages.php');