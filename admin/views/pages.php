<h1>Page Manager</h1>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <a href="?p=pages" class="list-group-item">
                <i class="fa fa-plus"> New Page</i>
            </a>

            <?php
            $query = "SELECT * FROM pages ORDER BY title ASC";
            $result = mysqli_query($dbc, $query);

            while ($list = mysqli_fetch_assoc($result)) {
                ?>
            <div id="page_<?php echo $list['id']; ?>" href="?p=pages&id=<?php echo $list['id']; ?>"
                     class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
                    <h4 class="list-group-item-heading"><?php echo $list['title']; ?></h4>
                    
                    <span class="pull-right">
                        <a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
                        <a href="?p=pages&id=<?php echo $list['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
                    </span>
                    
                    <p class="list-group-item-text"><?php echo strip_tags(substr($list['body'], 0, 100)); ?></p>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="col-md-7">

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <form action="?p=pages&id=<?php echo $opened['id']; ?>" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title'] ?>"
                       placeholder="Title">
            </div>

            <div class="form-group">
                <label for="user">User:</label>

                <select class="form-control" name="user" id="user">
                    <option value="0">No user</option>

                    <?php
                    $qquery = "SELECT * FROM users ORDER BY name ASC";
                    $result = mysqli_query($dbc, $qquery);

                    while ($user_list = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $user_list['id'] ?>"
                        <?php
                        if (isset($_GET['id'])) {
                            selected($user_list['id'], $opened['user'], 'selected');
                        } else {
                            selected($user_list['id'], $user['id'], 'selected');
                        }
                        ?>><?php echo $user_list['name'] ?></option>
                            <?php } ?>

                </select>
            </div>

            <div class="form-group">
                <label for="label">Slug:</label>
                <input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug'] ?>"
                       placeholder="Slug">
            </div>

            <div class="form-group">
                <label for="label">Label:</label>
                <input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label'] ?>"
                       placeholder="Label">
            </div>

            <div class="form-group">
                <label for="header">Header:</label>
                <input class="form-control" type="text" name="header" id="header"
                       value="<?php echo $opened['header'] ?>" placeholder="Header">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control editor" rows="8" name="body" id="body"
                          placeholder="Body"><?php echo $opened['body'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-default">Post</button>
            <input type="hidden" name="post" value="1">

            <?php if (isset($opened['id'])) { ?>
                <input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
            <?php } ?>

        </form>
    </div>
</div>
