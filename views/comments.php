<header>
    <h1>Comments</h1>
</header>

<?php
$comments = get_comments($dbc);

if ($comments) {
    foreach ($comments as $comment => $value) {
        echo $value['author'] . ' at ' . $value['date'] . '<br>';
        echo $value['content'] . '<hr>';
    }
} else {
    ?>
    <div class="well">
        <p class="lead">
            There is no comments at the moment. Write the first one?
        </p>
    </div>
<?php } ?>

<div class="contact-form">
    <form role="form" method="post" class="form-horizontal col-md-12" id="comment">
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
                <input type="submit" name="post" class="btn btn-lg btn-primary" value="Submit your message!"></input>
            </div>
        </div>
    </form>	
</div>