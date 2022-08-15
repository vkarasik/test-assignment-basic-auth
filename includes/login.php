<?php

include 'autoloader.php';

if (Helper::ajax_check()) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $auth = new LoginController($login, $pass);
    $response = $auth->signIn();
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Location: /');
}
