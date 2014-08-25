<?php if (isset($opened['id'])): ?>
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;

            var myDrop = new Dropzone('#avatar-dropzone');
            myDrop.on('success', function(file) {
                $('#avatar').load('ajax/avatar.php?id=<?php echo $opened['id']; ?>');
            });
        });
    </script>
<?php endif; ?>

<div class="col-md-4">
    <h1>User Manager</h1>
    <div class="list-group">
        <a href="?p=users" class="list-group-item">
            <i class="fa fa-plus"> New User</i>
        </a>
        <?php
        $users = get_user($dbc);

        foreach ($users as $user => $value) {
            ?>
            <a href="?p=users&id=<?php echo $value['id']; ?>"
               class="list-group-item <?php selected($value['id'], isset($opened['id']) ? $opened['id'] : NULL, 'active'); ?>">
                <h4 class="list-group-item-heading"><?php echo $value['name']; ?></h4>
                <p class="list-group-item-text"><?php echo $value['email'] ?></p>
            </a>
        <?php } ?>
    </div>
</div>
<div class="col-md-7">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <label>Drop or click to upload avatar:</label>
    <form action="<?php echo D_CONFIG . DS; ?>uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
    </form>

    <form action="?p=users&id=<?php echo $opened['id']; ?>" method="post" class="reg-log-form">

        <?php if (!empty($opened['avatar'])) { ?>
            <label for="avatar">Avatar:</label>
            <div id="avatar">
                <div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="status">Status:</label>

            <select class="form-control" name="status" id="status">
                <option value="0" <?php
                if (isset($_GET['id'])) {
                    selected('0', $opened['status'], 'selected');
                }
                ?>>Inactive
                </option>
                <option value="1" <?php
                if (isset($_GET['id'])) {
                    selected('1', $opened['status'], 'selected');
                }
                ?>>Active
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php echo $opened['username'] ?>"
                   placeholder="Username" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="name">First Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="<?php echo $opened['name'] ?>"
                   placeholder="Name" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="family">Last Name:</label>
            <input class="form-control" type="text" name="family" id="family" value="<?php echo $opened['family'] ?>"
                   placeholder="Family" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $opened['email'] ?>"
                   placeholder="Email" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="site">Site URL:</label>
            <input class="form-control" type="site" name="site" id="site" value="<?php echo $opened['site'] ?>"
                   placeholder="http://" autocomplete="off">
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

        <button type="submit" class="btn btn-default">Save</button>
        <input type="hidden" name="post" value="1">

        <?php if (isset($opened['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
            <?php
        }
        ?>

    </form>
</div>