<?php
class Signin
{
    use Controller;
    public function index($data = [])
    {
        $data['logoText'] = 'ServiceSystem';
        $data['title'] = 'Service System';
        $data['pageTitle'] = 'Login Page';
        $this->view_Pahe_without_Sidebar('signin', $data);
    }
}
