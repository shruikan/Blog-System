<?php if (isset($opened['id'])) { ?>
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;

            var myDrop = new Dropzone('#avatar-dropzone');
            myDrop.on('success', function(file) {
                $('#avatar').load('ajax/avatar.php?id=<?php echo $opened['id']; ?>');
            });
        });
    </script>
<?php } ?>


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
                    <!-- <p class="list-group-item-text"><?php //echo strip_tags(substr($page_list['body'], 0, 100));     ?></p> -->
                </a>
            <?php } ?>

        </div>
    </div>
    <?php require(D_VIEWS . '/register.php'); ?>
</div>