<?php
class Signin
{
    use Controller;
    public function index($data = [])
    {
        $request = new Request();
        if ($request->is_get()) {
            $data['logoText'] = 'ServiceSystem';
            $data['title'] = 'Service System';
            $data['pageTitle'] = 'Login Page';
            $this->view_Pahe_without_Sidebar('signin', $data);
        }else {
            $user = new User();
            $user_branch = new User_branch();
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            show($data); die();
        }
    }
}
