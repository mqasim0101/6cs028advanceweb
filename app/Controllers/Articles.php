<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
