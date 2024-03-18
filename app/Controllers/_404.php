<?php
class _404
{
    use Controller;
    public function index($data = [])
    {
        $data['logoText'] = 'ServiceSystem';
        $data['title'] = 'Service System';
        $data['pageTitle'] = '404 Page not found';
        //δείχνουμε την view μαζι με τα δεδομένα
        $this->view_Pahe_without_Sidebar('404', $data);
    }
}
