<div class="col-md-7">
    <header>
        <h1><?= ucfirst($path['call_parts'][0]) . ' profile'; ?></h1>
    </header>

    <?php
    $button = 'Register';

    if ($path['call_parts'][0] == 'user') {
        $user = get_user($dbc, $_SESSION['username']);
        $username = $user['username'];
        $button = 'Save';

        if (isset($_GET['id'])): ?>
            <script>
                $(document).ready(function() {
                    Dropzone.autoDiscover = false;

                    var myDrop = new Dropzone('#avatar-dropzone');
                    myDrop.on('success', function(file) {
                        $('#avatar').load('ajax/avatar.php?id=<?= $user['id']; ?>');
                    });
                });
            </script>
        <?php endif; ?>

        <form action="<?= ROOT . D_CONFIG . DS; ?>uploads.php?id=<?= $user['id']; ?>" class="dropzone" id="avatar-dropzone">
        </form>

        <form method="post" id="edit-form">

            <?php if (!empty($user['avatar'])) { ?>
                <label for="avatar">Avatar:</label>
                <div id="avatar">
                    <div class="avatar-container" style="background-image: url('<?= ROOT . 'uploads/' . $user['avatar']; ?>')"></div>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="name">First Name:</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>"
                       placeholder="Name" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="family">Last Name:</label>
                <input class="form-control" type="text" name="family" id="family" value="<?= $user['family']; ?>"
                       placeholder="Family" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="site">Site URL:</label>
                <input class="form-control" type="site" name="site" id="site" value="<?= $user['site']; ?>"
                       placeholder="http://" autocomplete="off">
            </div>
        <?php } else { ?>
            <form method="post" id="register-form">
            <?php } ?>

            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" value="<?= isset($username) ? $username : ''; ?>" <?php
                if (isset($user)) {
                    echo 'disabled';
                }
                ?> placeholder="Username" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="<?= isset($user['email']) ? $user['email'] : ''; ?>"
                       placeholder="Email" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password"
                       placeholder="Password" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password_v">Verify Password:</label>
                <input class="form-control" type="password" name="password_v" id="password_v"
                       placeholder="Verify Password" autocomplete="off">
            </div>

            <input type="submit" name="register" id="register" class="btn btn-success" value="<?= $button; ?>">

        </form>
</div>