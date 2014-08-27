<?php

if (isset($_POST['post_id'], $_POST['name'], $_POST['email'], $_POST['comment'])) {
    require ('../config/setup.php');

    $post_id = $_POST['post_id'];
    $author = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['comment'];

    // Validate
    if(empty($author) || empty($content)) {
        $message = 'Enter your name and your comment!';
    }
    if (strlen($author) < 2 || strlen($author) > 30) {
        $message = 'Your name must be between 2 and 30 characters!';
    }
    if (strlen($content) < 10 || strlen($content) > 300) {
        $message = 'Your comment must be between 10 and 300 characters!';
    }

    if (isset($message)) {
        $message = '<div class="alert alert-warning">' . $message . '</div>';
    } else {
        $query = "INSERT INTO comments (post_id, author, email, content) VALUES ($post_id, '$author', '$email', '$content')";
        $result = mysqli_query($dbc, $query);
    }
}