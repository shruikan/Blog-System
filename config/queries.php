<?php

// LOGIN
if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($dbc, $_POST['user']);
    $password = mysqli_real_escape_string($dbc, sha1($_POST['password']));

    $query = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $user;
        header('Location: home');
    } else {
        $message = '<div class="alert alert-warning">Wrong login data!</div>'; // TODO: Make error reporting
    }
}

// REGISTER
if (isset($_POST['register'])) {
    $ip = ip2long($_SERVER['REMOTE_ADDR']);
    $username = $_SESSION['username'];
    $user = mysqli_real_escape_string($dbc, $_POST['user']);
    $password = mysqli_real_escape_string($dbc, $_POST['password']);
    $password_v = mysqli_real_escape_string($dbc, $_POST['password_v']);
    $name = mysqli_real_escape_string($dbc, $_POST['name']);
    $family = mysqli_real_escape_string($dbc, $_POST['family']);
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $site = mysqli_real_escape_string($dbc, $_POST['url']);

    if (!empty($password)) {
        if ($password == $password_v) {
            $password = "password = 'sha1($password)',";
            $verify = true;
        } else {
            $verify = false;
        }
    } else {
        $verify = false;
    }

    if ($url == 'edit') {
        $query = "UPDATE users SET name = '$name', family = '$family', email = '$email', $password url = '$site' WHERE user = '$username'";
        $result = mysqli_query($dbc, $query);
    } else {
        $query = "INSERT INTO users (ip, user, email, password) VALUES ('$ip', '$user', '$email', $password)";

        if ($verify) {
            $result = mysqli_query($dbc, $query);
        }
    }

    if ($result) {
        $message = '<div class="alert alert-success">Welcome aboard!</div>';
        header('Location: home');
    } else {
        $message = '<div class="alert alert-danger">Error!</div>';

        if (!$verify) {
            $message = '<div class="alert alert-warning">Password do not match!</div>';
        }
    }
}

switch ($url) {
    case '':
    case 'post': $url = 'home';
        break;

    case 'edit': $url = 'register';
        break;

    case 'logout':
        if (!session_start()) {
            session_start();
        }
        session_destroy();

        header('Location: home');
        break;
}