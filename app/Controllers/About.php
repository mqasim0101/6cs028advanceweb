<?php

namespace App\Controllers;

class About extends BaseController
{
    // For about page:
    public function aboutus()
    {
        return view("templates/header")
            . view('pages/about')
            . view('templates/footer');
    }
}
