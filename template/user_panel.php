<nav class="pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile" style="background-image: url('<?= ROOT . D_UPLOADS . DS . $user['avatar']; ?>')">
                    <?= isset($_SESSION['username']) ? $username : 'Guest'; ?> <b class="caret"></b>
                </div>
            </a>

            <?php if (isset($_SESSION['username'])) { ?>
                <ul class="dropdown-menu">
                    <li><a href="<?= ROOT; ?>user/<?= $username; ?>">Edit Profile</a></li>
                    <?php if ($level == 3): ?>
                        <li><a href="<?= ROOT; ?>admin">Admin Panel</a></li>
                    <?php endif; ?>
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