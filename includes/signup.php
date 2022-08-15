<?php

include 'autoloader.php';

if (Helper::ajax_check()) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $passrepeat = $_POST['passrepeat'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $signup = new SignupController($login, $pass, $passrepeat, $email, $name);
    $response = $signup->signUp();
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Location: /');
}
