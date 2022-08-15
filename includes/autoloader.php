<?php
spl_autoload_register('autoloader');

function autoloader($class_name)
{
    $path = '../classes/';
    $ext = '.php';
    $full_path = $path . $class_name . $ext;
    include_once $full_path;
}
