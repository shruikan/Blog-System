<div class="col-md-8">
    <h1>Latest Posts</h1>

    <?php
    foreach ($posts as $post => $value) {
        $post_link = SITE . 'post/' . $value['id'] . '-' . $value['slug'];
        ?>
        <article>
            <h2><a href="<?= $post_link; ?>"><?= $value['title']; ?></a></h2>

            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <span class="glyphicon glyphicon-bookmark"></span> <a href="<?= $post_link ?>">Tags</a>
                </div>
                <div class="col-sm-6 col-md-7">
                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?= "$post_link#comment"; ?>">Comments</a>			          		
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= $value['date'] . ' by ' . $value['username'] . ' <i class="fa fa-eye"></i> ' . $value['counter'] . ' views'; ?>			          		
                </div>
            </div>

            <hr>

            <a href="<?= $post_link; ?>"><img src="<?= UPLOADS . $value['image']; ?>" class="img-responsive post-image"></a>

            <br />

            <p class="lead"><?= $comments ? $value['body'] : substr($value['body'], 0, 1000); ?></p>
                <!-- <p>Other text</p> -->
            <?php if (isset($path['call_parts'][2])) { ?>
                <p class="text-right">
                    <a href="<?= $post_link; ?>">
                        continue reading...
                    </a>
                </p>
            <?php } ?>
        </article>
    <?php } ?>
    <hr>
    <ul class="pager">
        <li class="previous"><a href="<?= $post_link; ?>">&larr; Previous</a></li>
        <li class="next"><a href="<?= $post_link; ?>">Next &rarr;</a></li>
    </ul>
    <hr>
    <?php
    if ($comments) {
        require 'comments.php';
    }
    ?>
</div>