<div class="col-md-4">
    <header>
        <h1>Post Manager</h1>
    </header>
    
    <div class="list-group">
        <a href="?p=posts" class="list-group-item">
            <i class="fa fa-plus"> New Post</i>
        </a>

        <?php
        $posts = get_posts($dbc);

        foreach ($posts as $post => $value) {
            $post_id = $value['id'];
            ?>
            <div id="post_<?= $post_id; ?>" href="?p=posts&id=<?= $post_id; ?>"
                 class="list-group-item <?php selected($post_id, $id, 'active'); ?>">
                <h4 class="list-group-item-heading"><?= $value['title']; ?></h4>

                <span class="pull-right">
                    <a href="#" id="del_<?= $post_id; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
                    <a href="?p=posts&id=<?= $post_id; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
                </span>

                <p class="list-group-item-text"><?= strip_tags(substr($value['body'], 0, 100)); ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<div class="col-md-8">

    <form action="?p=posts&id=<?= $post_id; ?>" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $opened[$id]['title']; ?>"
                   placeholder="Title">
        </div>
        
        <div class="form-group">
            <label for="username">User:</label>

            <select class="form-control" name="username" id="username">
                <option value="0">No user</option>
                <?php
                
                $users = get_user($dbc);

                foreach ($users as $user => $value) {
                    echo "<option value=" . $value['username'] . " ";
                    selected($opened[$id]['username'], $value['username'], 'selected');
                    echo '>' . $value['username'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="label">Slug:</label>
            <input class="form-control" type="text" name="slug" id="slug" value="<?= $opened[$id]['slug']; ?>"
                   placeholder="Slug">
        </div>

        <div class="form-group">
            <label for="label">Label:</label>
            <input class="form-control" type="text" name="label" id="label" value="<?= $opened[$id]['label']; ?>"
                   placeholder="Label">
        </div>

        <div class="form-group">
            <label for="header">Header:</label>
            <input class="form-control" type="text" name="header" id="header"
                   value="<?= $opened[$id]['header']; ?>" placeholder="Header">
        </div>

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control editor" rows="8" name="body" id="body"
                      placeholder="Body"><?= $opened[$id]['body']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-default">Save</button>
        <input type="hidden" name="post" value="1">

        <?php if (isset($opened[$id]['id'])) { ?>
            <input type="hidden" name="id" value="<?= $opened[$id]['id']; ?>">
        <?php } ?>

    </form>
</div>