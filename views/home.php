<div class="col-md-8">
    <h1>Latest Posts</h1>

    <?php
    if (isset($path['call_parts'][1])) {
        $currnet = explode('-', $path['call_parts'][1]);
    }

    $path['call_parts'][0] == 'home' || empty($path['call_parts'][0]) ?
                    $posts = get_posts($dbc, NULL) : $posts = get_posts($dbc, (int) $currnet[0]);

    foreach ($posts as $post => $value) {
        $post_link = ROOT . 'post/' . $value['id'] . '-' . $value['slug'];
        ?>
        <article>
            <h2><a href="<?= $post_link; ?>"><?= $value['title']; ?></a></h2>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-bookmark"></span> <a href="<?= $post_link ?>">Tags</a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?= "$post_link#comment"; ?>">Comments</a>			          		
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= $value['date'] . ' by ' . $value['user']['username']; ?>			          		
                </div>
            </div>

            <hr>

            <a href="<?= $post_link; ?>"><img src="http://placehold.it/900x300" class="img-responsive"></a>

            <br />

            <p class="lead"><?= $value['body']; ?></p>

                                                       <!-- <p>Other text</p> -->
            <?php if (isset($path['call_parts'][2])) { ?>
                <p class="text-right">
                    <a href="<?= $post_link; ?>">
                        continue reading...
                    </a>
                </p>
            <?php } ?>

            <hr>
        </article>
    <?php } ?>

    <ul class="pager">
        <li class="previous"><a href="<?= $post_link; ?>">&larr; Previous</a></li>
        <li class="next"><a href="<?= $post_link; ?>">Next &rarr;</a></li>
    </ul>
</div>