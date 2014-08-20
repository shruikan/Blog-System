<div class="col-md-7">

    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>


    <?php if (isset($opened['id'])) { ?>
        <label>Drop or click to upload avatar:</label>
        <form action="config/uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
        </form>
    <?php } ?>

    <form action="?p=users&id=<?php echo $opened['id']; ?>" method="post">

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
            <label for="user">Username:</label>
            <input class="form-control" type="text" name="user" id="user" value="<?php echo $opened['user'] ?>"
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
            <label for="url">Site URL:</label>
            <input class="form-control" type="url" name="url" id="url" value="<?php echo $opened['url'] ?>"
                   placeholder="URL" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" value=""
                   placeholder="Password" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password_v">Verify Password:</label>
            <input class="form-control" type="password" name="password_v" id="password_v" value=""
                   placeholder="Verify Password" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-default">Create</button>
        <input type="hidden" name="post" value="1">

        <?php if (isset($opened['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
        <?php } ?>

    </form>
</div>
