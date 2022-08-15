<?php

/**
 * LogoutController Class
 * 
 */
class LogoutController
{
    public function __construct()
    {
        session_start();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600, '/');
        header('Location: ../index.php');
    }
}
