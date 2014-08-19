<nav class="pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($user['user']) ? $user['user'] : 'Guest'; ?> <b class="caret"></b></a>
            <?php if (isset($user['user'])) { ?>
                <ul class="dropdown-menu">
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="views/logout.php">Logout</a></li>
                </ul>
            <?php } else { ?>
                <ul class="dropdown-menu">
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            <?php } ?>

        </li>
    </ul>
</nav>