<nav class="pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?> <b class="caret"></b></a>
            <?php if (isset($_SESSION['username'])) { ?>
                <ul class="dropdown-menu">
                    <li><a href="<?= ROOT; ?>user/<?= $_SESSION['username']; ?>">Edit Profile</a></li>
                    <li><a href="<?= ROOT; ?>logout">Logout</a></li>
                </ul>
            <?php } else { ?>
                <ul class="dropdown-menu">
                    <li><a href="<?= ROOT; ?>register">Register</a></li>
                    <li><a href="<?= ROOT; ?>login">Login</a></li>
                </ul>
            <?php } ?>
        </li>
    </ul>
</nav>