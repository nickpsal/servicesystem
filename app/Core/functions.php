<?php
function show($stuff): void
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function redirect($page)
{
    header("Location: " . URL . $page . '/');
    die();
}

function check_if_current_page($m)
{
    $current_page = basename($_SERVER['REQUEST_URI']);
    if ($current_page == $m) {
        return true;
    }
    return false;
}

function message($msg = '', $erase = false): mixed
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else if (!empty($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        if ($erase) {
            unset($_SESSION['message']);
        }
        return $msg;
    }
    return false;
}
