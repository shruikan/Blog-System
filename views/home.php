<div class="row">
    <div class="col-md-8">
        <h1>Latest Posts</h1>

        <?php
        $posts = get_posts($dbc);
        foreach ($posts as $post => $value) {
            ?>
            <article>
                <h2><a href="<?php echo $posts[$post]['slug']; ?>"><?php echo $posts[$post]['title']; ?></a></h2>

                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <span class="glyphicon glyphicon-bookmark"></span> <a href="#">Tags</a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <span class="glyphicon glyphicon-pencil"></span> <a href="#">Comments</a>			          		
                        &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php echo $posts[$post]['date']; ?>			          		
                    </div>
                </div>

                <hr>

                <img src="http://placehold.it/900x300" class="img-responsive">

                <br />

                <p class="lead"><?php echo $posts[$post]['body'] ?></p>

                       <!-- <p>Other text</p> -->

                <p class="text-right">
                    <a href="<?php echo $posts[$post]['slug'] ?>">
                        continue reading...
                    </a>
                </p>

                <hr>
            </article>
        <?php } ?>

        <ul class="pager">
            <li class="previous"><a href="#">&larr; Previous</a></li>
            <li class="next"><a href="#">Next &rarr;</a></li>
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
                <li class="list-group-item"><a href="singlepost.html">Post 1</a></li>
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