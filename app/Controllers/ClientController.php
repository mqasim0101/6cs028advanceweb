<?php

namespace App\Controllers;

use App\Models\ClientModel;

class ClientController extends BaseController
{
    public function home() // Change the method name to 'home'
    {
        return view('pages/home'); // Load the 'home' view
    }

    public function fetchClients()
    {
        $model = new ClientModel();
        $data = $model->findAll();
        return $this->response->setJSON($data);
        return view('ajax');
    }
}