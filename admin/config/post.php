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

    case 'pages':
        if (isset($_POST['post']) == 1) {

            $title = mysqli_real_escape_string($dbc, $_POST[title]);
            $label = mysqli_real_escape_string($dbc, $_POST[label]);
            $header = mysqli_real_escape_string($dbc, $_POST[header]);
            $body = mysqli_real_escape_string($dbc, $_POST[body]);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE pages SET user = '$_POST[user]', slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
            } else {
                $query = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ($_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";
                $action = 'added';
            }

            $result = mysqli_query($dbc, $query);

            if ($result) {
                $message = '<div class="alert alert-success">Page was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">Page coul not be ' . $action . '!Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';
            }
        }

        if (isset($_GET['id'])) {
            $opened = data_page($dbc, $_GET['id']);
        }

        break;

    case 'users':
        if (isset($_POST['post']) == 1) {

            $user = mysqli_real_escape_string($dbc, $_POST[user]);
            $name = mysqli_real_escape_string($dbc, $_POST[name]);
            $family = mysqli_real_escape_string($dbc, $_POST[family]);
            $email = mysqli_real_escape_string($dbc, $_POST[email]);
            $url = mysqli_real_escape_string($dbc, $_POST[url]);


            if (!empty($_POST['password'])) {
                if ($_POST['password'] == $_POST['password_v']) {
                    $password = "password = SHA1('$_POST[password]'),";
                    $verify = true;
                } else {
                    $verify = false;
                }
            } else {
                $verify = false;
            }

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE users SET user = '$user', name = '$name', family = '$family', email = '$email', url = '$url', $password status = $_POST[status] WHERE id = $_GET[id]";
                $result = mysqli_query($dbc, $query);
            } else {
                $action = 'added';
                $query = "INSERT INTO users (user, name, family, email, url, password, status) VALUES ('$user', '$name', '$family', '$_POST[email]', '$url', '$_POST[password]', $_POST[status])";

                if ($verify == true) {
                    $result = mysqli_query($dbc, $query);
                }
            }

            if ($result) {
                $message = '<div class="alert alert-success">User was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">User coul not be ' . $action . '!Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';

                if ($verify == false) {
                    $message = '<div class="alert alert-warning">Password do not match!</div>';
                }
            }
        }

        if (isset($_GET['id'])) {
            $opened = data_user($dbc, $_GET['id']);
        }

        break;

    case 'settings':
        if (isset($_POST['post']) == 1) {

            $id = mysqli_real_escape_string($dbc, $_POST[id]);
            $label = mysqli_real_escape_string($dbc, $_POST[label]);
            $value = mysqli_real_escape_string($dbc, $_POST[value]);

            if (isset($_POST['id']) != '') {
                $action = 'updated';
                $query = "UPDATE settings SET id = '$id', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
                $result = mysqli_query($dbc, $query);
            }

            if ($result) {
                $message = '<div class="alert alert-success">Settings was ' . $action . '!</div>';
            } else {
                $message = '<div class="alert alert-danger">Settings coul not be ' . $action . '! Error: ' . mysql_error($dbc) . ' ' . $query . '</div>';
            }
        }

        if (isset($_GET['id'])) {
            $opened = data_user($dbc, $_GET['id']);
        }
        break;

    default:
        break;
}