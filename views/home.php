<div class="row">
    <div class="col-md-3">
        <?php
        $categories = get_categories($dbc);
        
        foreach ($categories as $category) {
            echo $category;
        }
        
        ?>
    </div>

    <div class="col-md-8">
        <?php
        $posts = get_posts($dbc);
        foreach ($posts as $post => $value) {
            echo $posts[$post]['title'] . '<br>';
            echo $posts[$post]['date'] . '<br>';
            echo $posts[$post]['body'] . '<br>';
        }
        ?>
    </div>
</div>