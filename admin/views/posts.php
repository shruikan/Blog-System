<?php
if (isset($opened)) {
    $id = $opened[$id]['id'];
    ?>

    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;

            var myDrop = new Dropzone('#image-dropzone');
            myDrop.on('success', function(file) {
                $('#image').load('ajax/images.php?id=<?= $id; ?>');
            });
        });
    </script>
<?php } ?>

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

                <p class="list-group-item-text"><?= strip_tags(substr($value['body'], 0, 500)); ?></p>
            </div>
<?php } ?>

    </div>
</div>

<div class="col-md-8">

    <label>Drop or click to upload image:</label>

    <form action="<?= CONFIG; ?>uploads.php?id=<?= $id; ?>&type=image" class="dropzone" id="image-dropzone">
    </form>

    <form action="?p=posts&id=<?= $id; ?>" method="post">

<?php if (!empty($opened[$id]['image'])) { ?>
            <label for="image">Image:</label>
            <div id="image">
                <div class="image-container" style="background-image: url('../../uploads/<?= $opened[$id]['image']; ?>')"></div>
            </div>
<?php } ?>

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
            <label for="category">Category:</label>

            <select class="form-control" name="category" id="category">
                <option value="0">No category</option>
                <?php
                $categories = get_categories($dbc);

                foreach ($categories as $category => $value) {
                    echo "<option value=" . $value['label'] . " ";
                    selected($opened[$id]['category'], $value['label'], 'selected');
                    echo '>' . $value['label'] . '</option>';
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
        <div class="form-group">
            <button type="submit" class="btn btn-default">Save</button>
            <input type="hidden" name="post" value="1">
        </div>

        <?php if (isset($opened[$id]['id'])) { ?>
            <input type="hidden" name="id" value="<?= $opened[$id]['id']; ?>">
<?php } ?>

    </form>
</div>