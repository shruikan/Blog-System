<?php

// LOGIN
if (isset($_POST['login'])) {
    $username = format($dbc, $_POST['username']);
    $password = mysqli_real_escape_string($dbc, sha1($_POST['password']));

    // Validation
    if (!empty($username) && !empty($password)) {

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($dbc, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['id'] = mysqli_insert_id($dbc);
            $_SESSION['username'] = $username;
        } else {
            $message['warning'][] = 'Wrong login data!';
        }
    } else {
        $message['warning'][] = 'Enter your username and password!';
    }
}

switch ($page) {

    case 'dashboard':
        // TODO: Dashboard
        break;

    case 'posts':
        if (isset($_POST['post']) == 1) {

            $id = mysqli_real_escape_string($dbc, $_POST['id']);
            $username = mysqli_real_escape_string($dbc, $_POST['username']);
            $slug = mysqli_real_escape_string($dbc, $_POST['slug']);
            $title = mysqli_real_escape_string($dbc, $_POST['title']);
            $label = mysqli_real_escape_string($dbc, $_POST['label']);
            $header = mysqli_real_escape_string($dbc, $_POST['header']);
            $body = mysqli_real_escape_string($dbc, $_POST['body']);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE posts SET username = '$username', slug = '$slug', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $id";
            } else {
                $query = "INSERT INTO posts (username, slug, title, label, header, body) VALUES ($username, '$slug', '$title', '$label', '$header', '$body')";
                $action = 'added';
            }

            $result = mysqli_query($dbc, $query);

            if ($result) {
                $message['success'][] = "Post was $action!";
            } else {
                $message['warning'][] = "Post could not be $action!" . get_error($dbc, $query);
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
            $username = format($dbc, $_POST['username']);
            $password = mysqli_real_escape_string($dbc, sha1($_POST['password']));
            $password_v = mysqli_real_escape_string($dbc, sha1($_POST['password_v']));
            $email = mysqli_real_escape_string($dbc, strtolower($_POST['email']));
            $name = format($dbc, $_POST['name']);
            $family = format($dbc, $_POST['family']);
            $site = format($dbc, $_POST['site']);
            $status = mysqli_real_escape_string($dbc, $_POST['status']);
            $id = mysqli_real_escape_string($dbc, $_POST['id']);

            if (!empty($_POST['password'])) {
                if ($password == $password_v) {
                    $password = "password = 'sha1($password)',";
                    $verify = true;
                } else {
                    $verify = false;
                }
            } else {
                $verify = false;
            }

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE users SET username = '$username', name = '$name', family = '$family', email = '$email', site = '$site', $password status = $status WHERE id = $id";
                $result = mysqli_query($dbc, $query);
            } else {
                $action = 'added';
                $query = "INSERT INTO users (username, name, family, email, site, password, status) VALUES ('$username', '$name', '$family', '$email', '$site', $password $status)";

                if ($verify == true) {
                    $result = mysqli_query($dbc, $query);
                }
            }

            if ($result) {
                $message['success'][] = "User was $action!";
            } else {
                $message['warning'][] = "User could not be $action!" . get_error($dbc, $query);

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
            $site = mysqli_real_escape_string($dbc, $_POST['site']);
            $status = mysqli_real_escape_string($dbc, $_POST['status']);
            $opened_id = mysqli_real_escape_string($dbc, $_POST['openedid']);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE navigation SET id = '$id', label = '$label', site = '$site', status = $status WHERE id = '$opened_id'";
                $result = mysqli_query($dbc, $query);
            }

            if ($result) {
                $message['success'][] = "Navigation was $action!";
            } else {
                $message['warning'][] = "Navigation could not be $action!" . get_error($dbc, $query);
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
                $message['success'][] = "Settings was $action!";
            } else {
                $message['success'][] = "Settings could not be $action!" . get_error($dbc, $query);
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