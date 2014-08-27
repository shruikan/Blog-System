<section id="comments">
    <header class="titleBox">
        <h2>Comments</h2>
        <i class="close fa fa-chevron-down"></i>
    </header>
    <?php
    if(isset($_POST['ERROR'])) {
        echo $_POST['ERROR'];
    }
    ?>
    <!-- TODO: Make style for user post-->
    <div class="commentBox">
        <div id="status"></div>
        <div class="actionBox">
            <ul class="commentList">
                <?php
                $comments = get_comments($dbc, $current[0]);
                if ($comments) {
                    foreach ($comments as $comment => $value) {
                        $author = get_user($dbc, $value['author']);

                        if ($user['level'] == 3) {
                            echo '<i class="delete fa fa-times" data-commentid="' . $value["id"] . '"></i>';
                        }
                        ?>

                        <i class="close fa fa-chevron-down" id="<?= $value['id']; ?>"></i>
                        <li class="comment-<?= $value['id']; ?>">
                            <div class="commenterImage">
                                <img src="<?= get_avatar($dbc, $value['author'], UPLOADS); ?>" />
                            </div>
                            <div class="commentText">
                                <p><?= $value['content']; ?></p>
                                <span class="date sub-text">on <?= $value['date']; ?></span>
                                <span class="author sub-text">by <?= $value['author']; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } else { ?>
            <div class="well">
                <p class="lead">
                    There is no comments at the moment. Write the first one?
                </p>
            </div>
        <?php } ?>
    </div>

    <div id="status"></div>

    <form role="form" method="post" action="<?= AJAX . 'comments.php'; ?>" class="form-horizontal col-md-12" id="comment-form">
        <?php if (!$user['username']) { ?>
            <div class="form-group">
                <label for="name" class="col-md-2">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" id="name" required="required" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
        <?php } else { ?>
            <input type="hidden" name="name" value="<?= $user['username']; ?>">
            <input type="hidden" name="email" value="<?= $user['email']; ?>">
        <?php } ?>
            
        <input type="hidden" name="post_id" value="<?= $current[0]; ?>">
        <input type="hidden" name="date" value="<?= date('jS F Y, H:i:s'); ?>">
        <input type="hidden" name="thumbnail" value="<?= get_avatar($dbc, $user['id'], UPLOADS); ?>">

        <div class="form-group">
            <label for="comment" class="col-md-2">Comment</label>
            <div class="col-md-10">
                <textarea name="comment" id="comment" class="form-control" required="required" placeholder="Your comment..."></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <input type="submit" class="post-comment btn btn-lg btn-primary" value="Submit your message!">
            </div>
        </div>
    </form>
</section>