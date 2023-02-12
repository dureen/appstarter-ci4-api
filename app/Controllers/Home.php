<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');

        // if($session->get('name'))
        return view('template/header')
            . view('template/navigation')
            . view('page/main')
            . view('template/footer');
    }
}
