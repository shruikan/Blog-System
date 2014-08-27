<?php

function format($dbc, $id) {
    $id = strtolower($id);
    return mysqli_real_escape_string($dbc, ucfirst($id));
}

function selected($value1, $value2, $return) {
    if ($value1 == $value2) {
        echo $return;
    }
}

function get_settings($dbc) {
    $query = "SELECT * FROM settings";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $settings[$data['id']] = $data['value'];
    }

    return $settings;
}

function get_posts($dbc, $id = NULL, $by = NULL) {

    $cond = NULL;

    if (isset($id) && is_numeric($id)) {
        $cond = "WHERE id = $id";
    } else if (isset($by)) {
        $cond = "WHERE $by LIKE '$id'";
    }

    $query = "SELECT *, MONTHNAME(date) AS month, DAYOFMONTH(date) AS day, YEAR(date) AS year, HOUR(date) AS hour, MINUTE(date) AS minutes, SECOND(date) AS seconds FROM posts $cond ORDER BY date DESC";
    $result = mysqli_query($dbc, $query);

    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
            $posts[$data['id']] = $data;
        }
    }

    return $posts;
}

function get_category_post($dbc, $id) {
    $query = "SELECT * FROM posts WHERE category = '$id' ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $posts[$data['id']] = $data;
    }

    return $posts;
}

function get_latest_posts($dbc) {
    $query = "SELECT * FROM posts ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $posts[$data['id']] = $data;
    }

    return $posts;
}

function get_comments($dbc, $id) {
    $query = "SELECT * FROM comments WHERE post_id = $id ORDER BY date DESC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $comments[$data['id']] = $data;
    }

    return $comments;
}

function get_latest_comments($dbc) {
    $query = "SELECT * FROM comments ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $comments[$data['id']] = $data;
    }

    return $comments;
}

function get_categories($dbc) {
    $query = "SELECT * FROM categories ORDER BY label ASC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $categories[$data['id']] = $data;
    }

    return $categories;
}

function get_user($dbc, $id = NULL) {

    $cond = NULL;

    if (isset($id)) {
        if (is_numeric($id)) {
            $cond = "WHERE id = '$id'";
        } else {
            $cond = "WHERE username = '$id'";
        }
    }

    $query = "SELECT * FROM users $cond";
    $result = mysqli_query($dbc, $query);

    if ($result) {
        if (!isset($id)) {
            while ($data = mysqli_fetch_assoc($result)) {
                $users[$data['id']] = $data;
            }

            return $users;
        }

        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return FALSE;
    }
}

function get_avatar($dbc, $id, $path) {
    $user = get_user($dbc, $id);

    if ($user['avatar'] == 'avatar.png' || empty($user['avatar'])) {
        return $path . 'avatar.png';
    } else {
        return $path . $user['avatar'];
    }
}

function get_path() {
    $path = array();

    if (isset($_SERVER['REQUEST_URI'])) {
        $request_path = explode('?', $_SERVER['REQUEST_URI']);

        $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
        $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
        $path['call'] = utf8_decode($path['call_utf8']);

        if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
            $path['call'] = '';
        }

        $path['call_parts'] = explode('/', $path['call']);

        if (isset($request_path[1])) {
            $path['query_utf8'] = urldecode($request_path[1]);
            $path['query'] = utf8_decode(urldecode($request_path[1]));
            $vars = explode('&', $path['query']);

            foreach ($vars as $var) {
                $t = explode('=', $var);
                $path['query_vars'][$t[0]] = $t[1];
            }
        }
    }

    return $path;
}

function main_nav($dbc, $path) {
    $query = "SELECT * FROM navigation ORDER BY position ASC";
    $result = mysqli_query($dbc, $query);
    $navigation = NULL;

    while ($nav = mysqli_fetch_assoc($result)) {
        $navigation[$nav['id']] = $nav;
    }

    return $navigation;
}

