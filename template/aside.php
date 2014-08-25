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