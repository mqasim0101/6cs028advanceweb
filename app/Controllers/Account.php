<?php

namespace App\Controllers;

class Account extends BaseController
{
    // For Login Page:
    public function login_page()
    {
        return view('templates/header')
            . view('account/login')
            . view('templates/footer');
    }
    // For Signup Page:
    public function signup_page()
    {
        return view('templates/header')
            . view('account/signup')
            . view('templates/footer');
    }
    // For Account info page:
    public function account_information()
    {
        echo "Here it will contain information about the account!";
        return view('templates/header')
            . view('account/account_info')
            . view('templates/footer');
    }
}
