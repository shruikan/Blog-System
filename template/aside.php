<div class="col-md-4">
    <?php if (!isset($user['username'])): ?>
    <div class="well text-center">
        <p class="lead">
            Don't want to miss updates? Please click the below button!
        </p>
        <a href="<?= SITE . 'register'; ?>" class="btn btn-primary btn-lg">Register Now!</a>
    </div>
    <?php endif; ?>
    
    <!-- Latest Posts -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Latest Posts</h4>
        </div>
        <ul class="list-group">
            <?php
            $latest_posts = get_latest_posts($dbc);

            foreach ($latest_posts as $post) {
                ?>
                <li class="list-group-item"><a href="<?= SITE . 'post/' . $post['id'] . '-' . $post['slug']; ?>"><?= $post['title']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Categories</h4>
        </div>
        <ul class="list-group">
            <!-- Categories -->
            <?php
            $categories = get_categories($dbc);

            foreach ($categories as $category) {
                ?>
                <li class="list-group-item"><a href="<?= SITE . 'category/' . $category['slug']; ?>"><?= $category['label']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- Tags -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Tags</h4>
        </div>
        <div class="panel-body">
            <ul class="list-inline">
                <?php
                $labels = get_posts($dbc);
                
                foreach ($labels as $label) {?>
                <li><?php
                $tags = explode(', ', $label['label']);
                
                foreach ($tags as $tag) {
                    echo '<a href="'. SITE . 'post/tag/'. $tag .'">' . $tag . '</a> ';
                }
                
                ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- Recent Comments -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Recent Comments</h4>
        </div>
        <ul class="list-group">
            <?php
            $latest_comments = get_latest_comments($dbc);

            foreach ($latest_comments as $comment) {
                $post = get_posts($dbc, (int)$comment['post_id']);
                $currnt = $post[$comment['post_id']];
                ?>
                <li class="list-group-item">
                    <a href="<?= SITE . 'post/' . $comment['post_id'] . '-' . $currnt['slug']; ?>"><?= $comment['content']; ?></a><br>
                    <em>from <?= $currnt['username'] ?></em>
                </li>
                <?php } ?>
        </ul>
    </div>

</div>