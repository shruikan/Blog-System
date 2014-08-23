<nav class="pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?> <b class="caret"></b></a>
            <?php if (isset($_SESSION['username'])) { ?>
                <ul class="dropdown-menu">
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="<?php echo $site_url . 'logout' ?>">Logout</a></li>
                </ul>
            <?php } else { ?>
                <ul class="dropdown-menu">
                    <li><a href="register">Register</a></li>
                    <li><a href="login">Login</a></li>
                </ul>
            <?php } ?>

        </li>
    </ul>
</nav>