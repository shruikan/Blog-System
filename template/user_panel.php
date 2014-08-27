<nav class="pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile" style="background-image: url('<?= get_avatar($dbc, $user['username'], UPLOADS); ?>')">
                    <?= isset($user['username']) ? $user['username'] : 'Guest'; ?> <b class="caret"></b>
                </div>
            </a>

            <?php if (isset($_SESSION['username'])) { ?>
                <ul class="dropdown-menu">
                    <li><a href="<?= SITE; ?>user/<?= $user['username']; ?>">Edit Profile</a></li>
                    <?php if ($user['level'] == 3): ?>
                        <li><a href="<?= SITE; ?>admin">Admin Panel</a></li>
                    <?php endif; ?>
                    <li><a href="<?= SITE; ?>logout">Logout</a></li>
                </ul>
            <?php } else { ?>
                <ul class="dropdown-menu">
                    <li><a href="<?= SITE; ?>register">Register</a></li>
                    <li><a href="<?= SITE; ?>login">Login</a></li>
                </ul>
            <?php } ?>
        </li>
    </ul>
</nav>