<?php

namespace App\Controllers;

class Contactus extends BaseController
{
    // For Contactus Page:
    public function support()
    {
        return view("templates/header")
            . view('pages/contactus')
            . view('templates/footer');
    }
}
