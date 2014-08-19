<?php

if (isset($_POST['login'])) {
    
    $username = $_POST['username']; // TODO: VALIDATE
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE alias = '$username' AND password = '$password'"; // TODO: USE SHA
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo '<div class="alert alert-warning">Wrong login data!</div>'; // TODO: Make error reporting
        header('Location: index.php');
    }
}