<?php
const APP_NAME = "Service System APP";
const APP_DESC = "Service System APP Version 1.0 (C) 2024";
const DEBUG = true;
if ($_SERVER['SERVER_NAME'] == '127.0.0.1' or  $_SERVER['SERVER_NAME'] == 'localhost') {
    //localhost
    $host = $_SERVER['HTTP_HOST'];
    $folder = trim(dirname($_SERVER['PHP_SELF']), '/\\');
    $base_url = "http://$host/$folder";
    $parts = explode('/', $base_url);
    $path = implode('/', array_slice($parts, 0, count($parts) - 1));
    define('ROOT', $path . "/public");
    define('URL', $path . "/");
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'toor');
    define('DB_NAME', 'service_system_db');
} else {
    //live server
    define('ROOT', $_SERVER['HTTP_HOST'] . '/public');
    define('URL', $_SERVER['HTTP_HOST']);
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'toor');
    define('DB_NAME', 'service_system_db');
}
