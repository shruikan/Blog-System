<nav class="navbar navbar-default" role="navigation">

    <ul class="nav navbar-nav">
        <li><a href="?p=dashboard">Dashboard</a></li>
        <li><a href="?p=pages">Pages</a></li>
        <li><a href="?p=users">Users</a></li>
        <li><a href="?p=settings">Settings</a></li>
    </ul>

    <nav class="pull-right">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="views/logout.php">Logout</a></li>
                </ul>
            </li>

            <li>
                <button type="button" id="btn-debug" class="btn btn-default navbar-btn">
                    <i class="fa fa-bug"></i>
                </button>
            </li>
        </ul>
    </nav> <!-- END User Panel -->

</nav> <!-- END Main Nav -->

<div class="col-md-4 col-md-offset-4">
