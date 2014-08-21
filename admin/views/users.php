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
            $users = get_user($dbc);

            foreach ($users as $user => $value) {
                ?>
                <a href="?p=users&id=<?php echo $users[$user]['id']; ?>"
                   class="list-group-item <?php selected($users[$user]['id'], $opened['id'], 'active'); ?>">
                    <h4 class="list-group-item-heading"><?php echo $users[$user]['name']; ?></h4>
                    <p class="list-group-item-text"><?php echo $users[$user]['email'] ?></p>
                </a>
            <?php } ?>
        </div>
    </div>
    <?php require(D_VIEWS . DS . 'register.php'); ?>
</div>