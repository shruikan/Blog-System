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

function get_posts($dbc, $id) {

    $cond = NULL;

    if (isset($id) && is_numeric($id)) {
        $cond = "WHERE id = $id";
    } else if (isset($id)) {
        $cond = "WHERE label = $id";
    }

    $query = "SELECT *, MONTHNAME(date) AS month, DAYOFMONTH(date) AS day, YEAR(date) AS year, HOUR(date) AS hour, MINUTE(date) AS minutes, SECOND(date) AS seconds FROM posts $cond ORDER BY date DESC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {

        if ($data['id'] == 0) {
            continue;
        }
        if (isset($id)) {
            $posts[$data['id']]['body'] = $data['body'];
        } else {
            $posts[$data['id']]['body'] = substr($data['body'], 0, 230);
        }

        $posts[$data['id']]['id'] = $data['id'];
        $posts[$data['id']]['username'] = get_user($dbc, $data['username']);
        $posts[$data['id']]['date'] = "$data[month] $data[day], $data[year] at $data[hour]:$data[minutes]:$data[seconds]";
        $posts[$data['id']]['category'] = $data['category'];
        $posts[$data['id']]['slug'] = $data['slug'];
        $posts[$data['id']]['label'] = $data['label'];
        $posts[$data['id']]['title'] = $data['title'];
        $posts[$data['id']]['header'] = $data['header'];
    }

    return $posts;
}

function get_comments($dbc) {
    $query = "SELECT * FROM comments ORDER BY date DESC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $comments[$data['id']]['date'] = $data['date'];
        $comments[$data['id']]['author'] = $data['author'];
        $comments[$data['id']]['email'] = $data['email'];
        $comments[$data['id']]['content'] = $data['content'];
    }

    return $comments;
}

function get_categories($dbc) {
    $query = "SELECT * FROM categories ORDER BY label ASC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $categories[$data['id']] = $data['label'];
    }

    return $categories;
}

function get_user($dbc, $id) {

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
                $users[$data['id']]['id'] = $data['id'];
                $users[$data['id']]['avatar'] = $data['avatar'];
                $users[$data['id']]['username'] = $data['username'];
                $users[$data['id']]['name'] = $data['name'];
                $users[$data['id']]['family'] = $data['family'];
                $users[$data['id']]['email'] = $data['email'];
                $users[$data['id']]['site'] = $data['site'];
                $users[$data['id']]['reg_date'] = $data['reg_date'];
                $users[$data['id']]['status'] = $data['status'];
            }

            return $users;
        }

        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return NULL;
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

    while ($nav = mysqli_fetch_assoc($result)) {
        ?>
        <li <?php selected($path['call_parts'][0], $nav['url'], 'class="active"'); ?>><a href="<?= ROOT . $nav['url']; ?>"><?= $nav['label']; ?></a></li>
        <?php
    }
}
