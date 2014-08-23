<div class="row">
    <div class="col-md-8">
        <h1>Latest Posts</h1>

        <?php
        
        if(isset($path['call_parts'][1])) {
            $currnet = explode('-', $path['call_parts'][1]);
        }
        
        $path['call_parts'][0] == 'home' || empty($path['call_parts'][0]) ?
                        $posts = get_posts($dbc, NULL) : $posts = get_posts($dbc, (int)$currnet[0]);

        foreach ($posts as $post => $value) {
            $post_link = $site_url . 'post' . DS . $value['id'] . '-' . $value['slug'];
            ?>
            <article>
                <h2><a href="<?php echo $post_link; ?>"><?php echo $value['title']; ?></a></h2>

                <div class="row">
                    <div class="col-sm-6 col-md-7">
                        <span class="glyphicon glyphicon-bookmark"></span> <a href="<?php $post_link ?>">Tags</a>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo "$post_link#comment"; ?>">Comments</a>			          		
                        &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php echo $value['date']; ?>			          		
                    </div>
                </div>

                <hr>

                <a href="<?php echo $post_link; ?>"><img src="http://placehold.it/900x300" class="img-responsive"></a>

                <br />

                <p class="lead"><?php echo $posts[$post]['body']; ?></p>

                                                   <!-- <p>Other text</p> -->
                <?php if (!isset($currnet[0]) && isset($path['call_parts'][1])) { ?>
                    <p class="text-right">
                        <a href="<?php echo $post_link; ?>">
                            continue reading...
                        </a>
                    </p>
                <?php } ?>

                <hr>
            </article>
        <?php } ?>

        <ul class="pager">
            <li class="previous"><a href="<?php echo $post_link; ?>">&larr; Previous</a></li>
            <li class="next"><a href="<?php echo $post_link; ?>">Next &rarr;</a></li>
        </ul>

    </div>
    <div class="col-md-4">

        <div class="well text-center">
            <p class="lead">
                Don't want to miss updates? Please click the below button!
            </p>
            <button class="btn btn-primary btn-lg">Subscribe to my feed</button>
        </div>

        <!-- Latest Posts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Latest Posts</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">Post 1</a></li>
            </ul>
        </div>

        <!-- Categories -->
        <?php
        $categories = get_categories($dbc);

        foreach ($categories as $category) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Categories</h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="#"><?php echo $category; ?></a></li>
                </ul>
            </div>
        <?php } ?>

        <!-- Tags -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Tags</h4>
            </div>
            <div class="panel-body">
                <ul class="list-inline">
                    <li><a href="#">Tag</a></li>
                </ul>
            </div>
        </div>

        <!-- Recent Comments -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Recent Comments</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">comment</a></li>
            </ul>
        </div>

    </div>
</div>