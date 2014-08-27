<?php

function format($dbc, $id) {
    $id = strtolower($id);
    return mysqli_real_escape_string($dbc, ucfirst($id));
}

function get_error($dbc, $query) {
    return " Error: " . mysql_error($dbc) . " | $query";
}

function get_settings($dbc) {
    $query = "SELECT * FROM settings";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $settings[$data['id']] = $data['value'];
    }

    return $settings;
}

function get_posts($dbc, $id = NULL) {

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

        $posts[$data['id']] = $data;
    }

    return $posts;
}

function get_categories($dbc, $id = NULL) {
    $cond = NULL;
    
    if (isset($id)) {
        
        if (is_numeric($id)) {
            $cond = "WHERE id = '$id'";
        } else {
            $cond = "WHERE label = '$id'";
        }
    }
    
    $query = "SELECT * FROM categories $cond";
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

function selected($value1, $value2, $return) {
    if ($value1 == $value2) {
        echo $return;
    }
}
