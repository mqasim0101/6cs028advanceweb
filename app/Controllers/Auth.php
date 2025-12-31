<?php
namespace App\Controllers;

use App\Models\ClientModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }
    
    public function processRegister()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[clients.username]',
            'email' => 'required|valid_email|is_unique[clients.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'first_name' => 'required|max_length[50]',
            'last_name' => 'required|max_length[50]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $clientModel = new ClientModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name')
        ];
        
        if ($clientModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }
    
    public function login()
    {
        return view('auth/login');
    }
    
    public function processLogin()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $clientModel = new ClientModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $client = $clientModel->where('email', $email)->first();
        
        if ($client && password_verify($password, $client['password'])) {
            if ($client['is_active'] == 1) {
                $session = session();
                $sessionData = [
                    'client_id' => $client['id'],
                    'username' => $client['username'],
                    'email' => $client['email'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                
                return redirect()->to('/dashboard')->with('success', 'Welcome back!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Your account is inactive.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}