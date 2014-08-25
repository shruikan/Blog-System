<?php

function format($dbc, $id, $up) {
    $id = strtolower($id);
    
    if (!$up) {
        $id = ucfirst($id);
    }
    
    return mysqli_real_escape_string($dbc, $id);
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
        $posts[$data['id']]['username'] = $data['username'];
        $posts[$data['id']]['date'] = "$data[month] $data[day], $data[year] at $data[hour]:$data[minutes]:$data[seconds]";
        $posts[$data['id']]['category'] = $data['category'];
        $posts[$data['id']]['slug'] = $data['slug'];
        $posts[$data['id']]['label'] = $data['label'];
        $posts[$data['id']]['title'] = $data['title'];
        $posts[$data['id']]['header'] = $data['header'];
    }

    return $posts;
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
}
