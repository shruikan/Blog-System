<?php
switch ($url) {
    case '':
    case 'post': $url = 'home';
        break;
    
    case 'category': $url = 'home';
        break;

    case 'user': $url = 'register';
        break;

    case 'logout':
        if (!session_start()) {
            session_start();
        }
        session_destroy();

        header('Location: home');
        break;
}