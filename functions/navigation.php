<?php

switch ($url) {
    case '':
    case 'post': $url = 'home';
        $posts = get_posts($dbc);
        $comments = FALSE;
        break;

    case 'category': $url = 'home';
        $posts = get_category_post($dbc, $path['call_parts'][1]);
        break;
    case 'tag': break;

    case 'user': $url = 'register';
        break;

    case 'logout':
        if (!session_start()) {
            session_start();
        }
        session_destroy();

        header('Location: home');
        break;
}

if ($path['call_parts'][0] == 'post' && isset($path['call_parts'][1])) {
    $current = explode('-', $path['call_parts'][1]);
    $posts = get_posts($dbc, (int) $current[0]);
    $comments = TRUE;
    mysqli_query($dbc, "UPDATE posts SET `counter` = `counter` + 1 WHERE id = $current[0]");
}

if (isset($_POST['search'])) {
    foreach ($output as $key => $value) {
        $posts = get_posts($dbc, $value['id']);
    }
}