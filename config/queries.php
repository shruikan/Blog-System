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
            $data = mysqli_fetch_assoc($result);

            $_SESSION['id'] = mysqli_insert_id($dbc);
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            header('Location: home');
        } else {
            $message['warning'][] = 'Wrong login data!';
        }
    } else {
        $message['warning'][] = 'Enter your username and password!';
    }
}

// EDIT AND REGISTER PROFILE
if (isset($_POST['register'])) {

    $ip = ip2long($_SERVER['REMOTE_ADDR']);
    $username = format($dbc, $_POST['username']);
    $password = mysqli_real_escape_string($dbc, $_POST['password']);
    $password_v = mysqli_real_escape_string($dbc, $_POST['password_v']);
    $email = mysqli_real_escape_string($dbc, strtolower($_POST['email']));

    if (isset($_SESSION['username'])) { // Edit Profile
        $name = format($dbc, $_POST['name']);
        $family = format($dbc, $_POST['family']);
        $site = format($dbc, $_POST['site']);

        // Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message['warning'][] = 'The email is not valid!';
        }
        if (!empty($password) && $password == $password_v && strlen($password) < 5) {
            $message['warning'][] = 'The password is too short!';
        }
        if ($password != $password_v) {
            $message['warning'][] = 'The passwords does not match!';
        }
        if (!isset($message)) { // Check for existing email
            $chek = "SELECT username FROM users WHERE email = '$email'";
            $result = mysqli_query($dbc, $chek);

            if (mysqli_num_rows($result) > 0) {
                $notice['warning'][] = 'The email is already in use!';
            }
        }

        if (!isset($message)) {
            // Check for existing fields
            $name = empty($name) ? "name = NULL," : "name = '$name',";
            $family = empty($family) ? "family = NULL," : "family = '$family',";
            $site = empty($site) ? "site = NULL," : "site = '$site',";
            $password = empty($password) ? $password = NULL : "password = sha1('$password'),";

            $username = $_SESSION['username'];
            $query = "UPDATE users SET $name $family $site $password email = '$email' WHERE username = '$username'";

            if (mysqli_query($dbc, $query)) {
                $message['success'][] = 'Your profile is successfully updated!';
            } else {
                $message['warning'][] = 'An error occured! Please try again!';
            }
        }
    } else { // Register Profile
        // Validation
        if (empty($username) || empty($email) || empty($password) || empty($password_v)) {
            $message['warning'][] = 'Please fill all the fields!';
        }
        if (!empty($username) && !preg_match('/^\w{5,12}$/', $username)) {
            $message['warning'][] = 'The username must contain only alphanumeric and be between 5 and 12 characters!';
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message['warning'][] = 'The email is not valid!';
        }
        if (!empty($password) && $password == $password_v && strlen($password) < 5) {
            $message['warning'][] = 'The password is too short!';
        }
        if ($password != $password_v) {
            $message['warning'][] = 'The passwords does not match!';
        }

        // Check for existing email
        if (!isset($message)) {
            $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $result = mysqli_query($dbc, $query);

            if (mysqli_num_rows($result) > 0) {
                $message['warning'][] = 'The username or email is already in use!';
            }
        }

        if (!isset($message)) {

            $query = "INSERT INTO users (ip, username, password, email) VALUES ('$ip', '$username','" . sha1($password) . "','$email')";

            if (mysqli_query($dbc, $query)) {
                $_SESSION['username'] = $username;
                $message['success'][] = 'Welcome aboard!';
                header('Location: home');
            } else {
                $message['warning'][] = 'An error occured! Please try again!';
            }
        }
    }
}

// COMMENTS
if (isset($_POST['post'])) {

    $comment = mysqli_real_escape_string($dbc, $_POST['comment']);
    $post_id = $_POST['post_id'];

    if (!isset($_SESSION['username'])) {
        $name = format($dbc, $_POST['name']);
        $email = mysqli_real_escape_string($dbc, strtolower($_POST['email']));

        // Validation
        if (empty($name) || empty($email) || empty($comment)) {
            $message['warning'][] = 'Please fill all the fields!';
        }
        if (!empty($name) && !preg_match('/^\w{5,12}$/', $name)) {
            $message['warning'][] = 'The username must contain only alphanumeric and be between 5 and 12 characters!';
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message['warning'][] = 'The email is not valid!';
        }
        if (!isset($message)) {
            $query = "INSERT INTO comments (post_id, author, email, content) VALUES ($post_id, '$name','$email','$comment')";
        }
    } else { // Logged user
        // Validation
        if (empty($comment)) {
            $message['warning'][] = 'Enter a comment!';
        }

        if (!isset($message)) {
            $user = get_user($dbc, $_SESSION['username']);
            $username = $user['username'];
            $email = $user['email'];

            $query = "INSERT INTO comments (post_id, author, email, content) VALUES ($post_id, '$username','$email','$comment')";
        }
    }

    if (mysqli_query($dbc, $query)) {
        $message['success'][] = 'Thank you for your comment!';
    } else {
        $message['warning'][] = 'An error occured! Please try again!';
    }
}

// EMAIL
if (isset($_POST['mail'])) {

    $subject = format($dbc, $_POST['subject']);
    $content = wordwrap($_POST['message'], 70);
    $family = NULL;

    if (!isset($_SESSION['username'])) {

        $name = format($dbc, $_POST['name']);
        $email = $_POST['email'];

        if (empty($subject) || empty($content) || empty($email)) {
            $message['warning'][] = 'Please fill all the fields!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message['warning'][] = 'The email is not valid!';
        }
    } else {
        $user = get_user($dbc, $_SESSION['username']);
        $name = $user['name'];
        $family = $user['family'];
        $email = $user['email'];

        if (empty($subject) || empty($content)) {
            $message['warning'][] = 'Please fill all the fields!';
        }
    }
    if (!isset($message)) {
        $headers = 'From: ' . "$email\r\n" .
                'Reply-To: ' . "$email\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($site_email, $subject, $content . "\r\n$name $family", $headers);


        $message['success'][] = 'Thank you for the feedback!';
    }
}


if ($_POST['search']) {
    $query = "SELECT * FROM posts WHERE label LIKE '%" . $_POST['search'] . "%'";
    $result = mysqli_query($dbc, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $output[$data['id']] = $data;
    }
}