<h1><?php echo ucfirst($path['call_parts'][0]) . ' profile'; ?></h1>

<div class="col-md-7">
    <?php
    if (isset($message)) {
        echo $message;
    }
    $button = 'Register';
    if ($path['call_parts'][0] == 'edit') {
        $user = get_user($dbc, $_SESSION['username']);
        $button = 'Save';

        if (isset($_GET['id'])) {
            ?>
            <script>
                $(document).ready(function() {
                    Dropzone.autoDiscover = false;

                    var myDrop = new Dropzone('#avatar-dropzone');
                    myDrop.on('success', function(file) {
                        $('#avatar').load('ajax/avatar.php?id=<?php echo $user['id']; ?>');
                    });
                });
            </script>
    <?php } ?>

        <form action="<?php echo $site_url . D_CONFIG . DS; ?>uploads.php?id=<?php echo $user['id']; ?>" class="dropzone" id="avatar-dropzone">
        </form>

        <form method="post">

    <?php if (!empty($user['avatar'])) { ?>
                <label for="avatar">Avatar:</label>
                <div id="avatar">
                    <div class="avatar-container" style="background-image: url('/uploads/<?php echo $user['avatar']; ?>')"></div>
                </div>
    <?php } ?>

            <div class="form-group">
                <label for="name">First Name:</label>
                <input class="form-control pull-left" type="text" name="name" id="name" value="<?php echo $user['name']; ?>"
                       placeholder="Name" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="family">Last Name:</label>
                <input class="form-control pull-left" type="text" name="family" id="family" value="<?php echo $user['family']; ?>"
                       placeholder="Family" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="url">Site URL:</label>
                <input class="form-control pull-left" type="url" name="url" id="url" value="<?php echo $user['url']; ?>"
                       placeholder="URL" autocomplete="off">
            </div>
            <?php } else { ?>
            <form method="post">
            <?php } ?>

            <div class="form-group">
                <!--                TODO: Disable on edit-->
                <label for="user">Username:</label>
                <input class="form-control" type="text" name="user" id="user" value="<?php echo $user['user']; ?>" <?php
                if (isset($username)) {
                    echo 'disabled';
                }
                ?>
                       placeholder="Username" autocomplete="off">
<!--                <span class="glyphicon glyphicon-ok green-tick pull-right"></span>-->
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $user['email']; ?>"
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

            <input type="submit" name="register" id="register" class="btn btn-success" value="<?php echo $button; ?>">

        </form>
</div>