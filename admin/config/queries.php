<?php

if (isset($_POST['login'])) {

    $user = mysqli_real_escape_string($dbc, $_POST['user']);
    $password = mysqli_real_escape_string($dbc, sha1($_POST['password']));

    $query = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $user;
        header('Location: index.php');
    } else {
        echo '<div class="alert alert-warning">Wrong login data!</div>'; // TODO: Make error reporting
        header('Location: index.php');
    }
}

switch ($page) {

    case 'dashboard':
        // TODO: Dashboard
        break;

    case 'posts':
        if (isset($_POST['post']) == 1) {
            
            $id = mysqli_real_escape_string($dbc, $_POST['id']);
            $user = mysqli_real_escape_string($dbc, $_POST['user']);
            $slug = mysqli_real_escape_string($dbc, $_POST['slug']);
            $title = mysqli_real_escape_string($dbc, $_POST['title']);
            $label = mysqli_real_escape_string($dbc, $_POST['label']);
            $header = mysqli_real_escape_string($dbc, $_POST['header']);
            $body = mysqli_real_escape_string($dbc, $_POST['body']);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE posts SET user = '$user', slug = '$slug', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $id";
            } else {
                $query = "INSERT INTO posts (user, slug, title, label, header, body) VALUES ($user, '$slug', '$title', '$label', '$header', '$body')";
                $action = 'added';
            }

            $result = mysqli_query($dbc, $query);

            if ($result) {
                $message = '<div class="alert alert-success">Post was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">Post could not be ' . $action . '!Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';
            }
        }

        if (isset($_GET['id'])) {
            $opened = get_posts($dbc, $_GET['id']);
        } else {
            $opened = NULL;
        }

        break;

    case 'users':
        if (isset($_POST['post'])) {

            $user = mysqli_real_escape_string($dbc, $_POST['user']);
            $password = mysqli_real_escape_string($dbc, sha1($_POST['password']));
            $password_v = mysqli_real_escape_string($dbc, sha1($_POST['password_v']));
            $name = mysqli_real_escape_string($dbc, $_POST['name']);
            $family = mysqli_real_escape_string($dbc, $_POST['family']);
            $email = mysqli_real_escape_string($dbc, $_POST['email']);
            $url = mysqli_real_escape_string($dbc, $_POST['url']);
            
            $status = mysqli_real_escape_string($dbc, $_POST['status']);
            $id = mysqli_real_escape_string($dbc, $_POST['id']);


            if (!empty($_POST['password'])) {
                if ($password == $password_v) {
                    $password = "password = '$password',";
                    $verify = true;
                } else {
                    $verify = false;
                }
            } else {
                $verify = false;
            }

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE users SET user = '$user', name = '$name', family = '$family', email = '$email', url = '$url', $password status = $status WHERE id = $id";
                $result = mysqli_query($dbc, $query);
            } else {
                $action = 'added';
                $query = "INSERT INTO users (user, name, family, email, url, password, status) VALUES ('$user', '$name', '$family', '$email', '$url', $password $status)";

                if ($verify == true) {
                    $result = mysqli_query($dbc, $query);
                }
            }

            if ($result) {
                $message = '<div class="alert alert-success">User was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">User could not be ' . $action . '!Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';

                if ($verify == false) {
                    $message = '<div class="alert alert-warning">Password do not match!</div>';
                }
            }
        }

        if (isset($_GET['id'])) {
            $opened = get_user($dbc, $_GET['id']);
        }

        break;

    case 'navigation':
        if (isset($_POST['login'])) {

            $id = mysqli_real_escape_string($dbc, $_POST['id']);
            $label = mysqli_real_escape_string($dbc, $_POST['label']);
            $url = mysqli_real_escape_string($dbc, $_POST['url']);
            $status = mysqli_real_escape_string($dbc, $_POST['status']);
            $opened_id = mysqli_real_escape_string($dbc, $_POST['openedid']);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE navigation SET id = '$id', label = '$label', url = '$url', status = $status WHERE id = '$opened_id'";
                $result = mysqli_query($dbc, $query);
            }

            if ($result) {
                $message = '<div class="alert alert-success">Navigation was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">Navigation could not be ' . $action . '! Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';
            }
        }

        if (isset($_GET['id'])) {
            $opened = get_user($dbc, $_GET['id']);
        }
        break;

    case 'settings':
        if (isset($_POST['post']) == 1) {

            $id = mysqli_real_escape_string($dbc, $_POST['id']);
            $label = mysqli_real_escape_string($dbc, $_POST['label']);
            $value = mysqli_real_escape_string($dbc, $_POST['value']);
            $opened_id = mysqli_real_escape_string($dbc, $_POST['openedid']);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE settings SET id = '$id', label = '$label', value = '$value' WHERE id = '$opened_id'";
                $result = mysqli_query($dbc, $query);
            }

            if ($result) {
                $message = '<div class="alert alert-success">Settings was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">Settings could not be ' . $action . '! Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';
            }
        }

        if (isset($_GET['id'])) {
            $opened = get_user($dbc, $_GET['id']);
        }
        break;

    case 'logout':
        if (!session_start()) {
            session_start();
        }
        session_destroy();

        header('Location: index.php');
        break;
    default:
        break;
}