<?php
class Home
{
    use Controller;
    public function index($data = [])
    {
        $data['logoText'] = 'ServiceSystem';
        $data['title'] = 'Service System';
        $data['pageTitle'] = 'Home Page';
        $this->view('home', $data);
    }
}
