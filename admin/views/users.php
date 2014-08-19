<h1>User Manager</h1>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <a href="?p=users" class="list-group-item">
                <i class="fa fa-plus"> New User</i>
            </a>

            <?php
            $query = "SELECT * FROM users ORDER BY user ASC";
            $result = mysqli_query($dbc, $query);

            while ($list = mysqli_fetch_assoc($result)) {

                $list = data_user($dbc, $list['id']);
                ?>
                <a href="?p=users&id=<?php echo $list['id'] ?>"
                   class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
                    <h4 class="list-group-item-heading"><?php echo $list['user']; ?></h4>
                    <!-- <p class="list-group-item-text"><?php //echo strip_tags(substr($page_list['body'], 0, 100));  ?></p> -->
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

        <form action="?p=users&id=<?php echo $opened['id']; ?>" method="post">

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
</div>