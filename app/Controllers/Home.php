<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    // Website Main Page:
    public function show()
    {
        return view("templates/header")
            . view('/pages/home')
            . view('templates/footer');
    }
}
