<?php

function data_page($dbc, $id) {
    if (is_numeric($id)) {
        $cond = "WHERE id = $id";
    } else {
        $cond = "WHERE slug = '$id'";
    }

    $query = "SELECT * FROM pages $cond";
    $result = mysqli_query($dbc, $query);
    $data = mysqli_fetch_assoc($result);

    $data['body_stripped'] = strip_tags($data['body']);

    if ($data['body'] == $data['body_stripped']) {
        $data['body_formatted'] = '<p>' . $data['body'] . '</p>';
    } else {
        $data['body_formatted'] = $data['body'];
    }

    return $data;
}

function data_user($dbc, $id) {
    if (is_numeric($id)) {
        $cond = "WHERE id = '$id'";
    } else {
        $cond = "WHERE user = '$id'";
    }

    $query = "SELECT * FROM users $cond";
    $result = mysqli_query($dbc, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
}