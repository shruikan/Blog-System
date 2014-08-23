<h1>Register</h1>

<div class="col-md-7">
    <?php
    if (isset($message)) {
        echo $message;
    }
    if ($path['call_parts'][1] == 'edit') {
        ?>
        <script>
            $(document).ready(function() {
                Dropzone.autoDiscover = false;

                var myDrop = new Dropzone('#avatar-dropzone');
                myDrop.on('success', function(file) {
                    $('#avatar').load('ajax/avatar.php?id=<?php echo $opened['id']; ?>');
                });
            });
        </script>
        <label>Drop or click to upload avatar:</label>
        <form action="<?php echo ROOT ?>" class="dropzone" id="avatar-dropzone"> <!-- TODO fix path -->
        </form>

        <form method="post">

            <?php if (!empty($opened['avatar'])) { ?>
                <label for="avatar">Avatar:</label>
                <div id="avatar">
                    <div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>
                </div>
            <?php } ?>

            <div class="form-group">
                <label for="name">First Name:</label>
                <input class="form-control pull-left" type="text" name="name" id="name"
                       placeholder="Name" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="family">Last Name:</label>
                <input class="form-control pull-left" type="text" name="family" id="family"
                       placeholder="Family" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="url">Site URL:</label>
                <input class="form-control pull-left" type="url" name="url" id="url"
                       placeholder="URL" autocomplete="off">
            </div>
        <?php } else { ?>
            <form method="post">
            <?php } ?>

            <div class="form-group">
                <label for="user">Username:</label>
                <input class="form-control" type="text" name="user" id="user"
                       placeholder="Username" autocomplete="off">
<!--                <span class="glyphicon glyphicon-ok green-tick pull-right"></span>-->
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email"
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

            <input type="submit" name="register" id="register" class="btn btn-success" value="Register">
            <!-- TODO fix margin -->

        </form>
</div>