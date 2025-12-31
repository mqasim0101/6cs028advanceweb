<?php

namespace App\Controllers;

use App\Models\ClientModel;

class Client extends BaseController
{
    public function register(){
        // code here:
        return view('auth/register'); // Register is file stored in view
    }
    // Store data in a database from post form:
        public function store(){
            $clientmodel = new ClientModel();
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $data = [
                'username' => $username, // username is the same columns username is clients table
                'email' => $email,
                'password' => password_hash((string)$password, PASSWORD_DEFAULT) // We need to hash this password for security, just use built-in function of php
            ];
            // all data already add now model work on it.
            $clientModel = save($data);// just one line to  complete save
            return redirect()-to('/auth/login'); // we will create login later!
        }
        // Login function:
        public function login(){
            return view('/auth/login'); // for login view at auth folders in view;
        }
        // verify login:
        public function verifylogin(){
            $clientModel = new ClientModel();
            // get data from post form:
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                // check if user is in database already or not:
                $data = $clientModel->where('username', $username)->first();
                if($data){
                    //set session for store login success:
                    session()->set([
                    'id' =>$data['id'],
                    'username' =>$data['username'],
                    'logged in' =>true
                    ]);
                    // Return to home page:
                    return redirect()->to('/');
                }else{
                    // 
                    return redirect()->to('/auth/login');
                }
        }
        // Logout function below:
        public function logout(){
            // destroy all session:
            session()->destroy();
            // redirect to login page:
            return redirect()->to('/auth/login');
        }
}