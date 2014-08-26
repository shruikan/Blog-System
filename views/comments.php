<section id="comments">
    <header class="titleBox">
        <h2>Comments</h2>
        <i class="close fa fa-chevron-down"></i>
    </header>

    <div class="commentBox">
        <div class="actionBox">
            <ul class="commentList">
                <?php
                $comments = get_comments($dbc, $current[0]);
                if ($comments) {
                    foreach ($comments as $comment => $value) {
                        $author = get_user($dbc, $value['author']);
                        ?>
                        <!--  admin only                      <button type="button" class="close" aria-hidden="true">&times;</button>-->
                        <i class="close fa fa-chevron-down" data-commentid="<?= $value['id']; ?>"></i>
                        <li class="comment-<?= $value['id']; ?>">
                            <div class="commenterImage">
                                <img src="<?= $site_url . D_UPLOADS . DS . $author['avatar']; ?>" />
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

    <form role="form" method="post" class="form-horizontal col-md-12" id="comment-form">
        <?php if (!isset($username)): ?>
            <div class="form-group">
                <label for="name" class="col-md-2">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="comment" class="col-md-2">Comment</label>
            <div class="col-md-10">
                <textarea name="comment" id="comment" class="form-control" placeholder="Your comment..."></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <input type="hidden" name="post_id" value="<?= $current[0]; ?>">
                <input type="button" name="post" id="post" class="btn btn-lg btn-primary" value="Submit your message!"></input>
            </div>
        </div>
    </form>
</section>