<?php

function get_settings($dbc) {
    $query = "SELECT * FROM settings";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $settings[$data['id']] = $data['value'];
    }

    return $settings;
}

function get_posts($dbc) {

    $query = "SELECT *, MONTHNAME(date) AS month, DAYOFMONTH(date) AS day, YEAR(date) AS year FROM posts ORDER BY date DESC";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {

        $posts[$data['id']]['id'] = $data['id'];
        $posts[$data['id']]['user'] = $data['user'];
        $posts[$data['id']]['date'] = "$data[month] $data[day], $data[year]";
        $posts[$data['id']]['category'] = $data['category'];
        $posts[$data['id']]['slug'] = $data['slug'];
        $posts[$data['id']]['label'] = $data['label'];
        $posts[$data['id']]['title'] = $data['title'];
        $posts[$data['id']]['header'] = $data['header'];
        $posts[$data['id']]['body'] = $data['body'];
        $posts[$data['id']]['status'] = $data['status'];
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

    if (isset($id)) {
        if (is_numeric($id)) {
            $cond = "WHERE id = '$id'";
        } else {
            $cond = "WHERE user = '$id'";
        }
    }

    $query = "SELECT * FROM users $cond";
    $result = mysqli_query($dbc, $query);

    if (!isset($id)) {
        while ($data = mysqli_fetch_assoc($result)) {
            $users[$data['id']]['id'] = $data['id'];
            $users[$data['id']]['avatar'] = $data['avatar'];
            $users[$data['id']]['user'] = $data['user'];
            $users[$data['id']]['name'] = $data['name'];
            $users[$data['id']]['family'] = $data['family'];
            $users[$data['id']]['email'] = $data['email'];
            $users[$data['id']]['url'] = $data['url'];
            $users[$data['id']]['reg_date'] = $data['reg_date'];
            $users[$data['id']]['status'] = $data['status'];
        }

        return $users;
    }

    $data = mysqli_fetch_assoc($result);
    return $data;
}