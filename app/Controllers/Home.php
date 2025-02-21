<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Dashboard';
        $data['sidebarData'] = 'dashboard';
        return view('user/index', $data);
    }
}
