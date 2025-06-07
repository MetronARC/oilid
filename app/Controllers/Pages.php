<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        $data['active_page'] = 'home';
        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data['active_page'] = 'about';
        return view('pages/about', $data);
    }

    public function contact(): string
    {
        $data['active_page'] = 'contact';
        return view('pages/contact', $data);
    }
}
