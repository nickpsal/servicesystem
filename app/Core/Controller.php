<?php
trait Controller
{
    public function view($view, $data = [])
    {
        $header = "../app/Views/includes/header.php";
        $sidebar = "../app/Views/includes/sidebar.php";
        $navbar = "../app/Views/includes/navbar.php";
        $filename = "../app/Views/" . $view . ".view.php";
        $footerText = "../app/Views/includes/footertext.php";
        $footer = "../app/Views/includes/footer.php";
        if (file_exists($header)) {
            require $header;
        } else {
            echo "not found";
        }
        if (file_exists($sidebar)) {
            require $sidebar;
        } else {
            echo "not found";
        }
        if (file_exists($navbar)) {
            require $navbar;
        } else {
            echo "not found";
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            require "../app/Views/404.view.php";
        }
        if (file_exists($footerText)) {
            require $footerText;
        } else {
            echo "not found";
        }
        if (file_exists($footer)) {
            require $footer;
        } else {
            echo "not found";
        }
    }

    public function view_Pahe_without_Sidebar($view, $data = [])
    {
        $header = "../app/Views/includes/header.php";
        $filename = "../app/Views/" . $view . ".view.php";
        $footer = "../app/Views/includes/footer.php";
        if (file_exists($header)) {
            require $header;
        } else {
            echo "not found";
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            require "../app/Views/404.view.php";
        }
        if (file_exists($footer)) {
            require $footer;
        } else {
            echo "not found";
        }
    }
}
