<?php

namespace App\Controllers;

use App\Models\MessagesModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Messages extends BaseController
{
    public function read()
    {
        $model = model(MessagesModel::class);

        $data = [
            'messages_list' => $model->getMessages(),
            'username'     => 'Messages archive',
        ];

        return view('templates/header', $data)
            . view('messages/read')
            . view('templates/footer');
    }

    public function show(?string $slug = null)
    {
        $model = model(MessagesModel::class);

        $data['messages'] = $model->getMessages($slug);

        if ($data['messages'] === null) {
            throw new PageNotFoundException('Cannot find the messages item: ' . $slug);
        }

        $data['username'] = $data['messages']['username'];

        return view('templates/header', $data)
            . view('messages/')
            . view('templates/footer');
    }
    // new function for adding messages:
    public function new()
    {
        helper('form');

        return view('templates/header', ['username' => 'Create a messages item'])
            . view('messages/create')
            . view('templates/footer');
    }
    // Creating form code:
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['username', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'username' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(MessagesModel::class);

        $model->save([
            'username' => $post['username'],
            'slug'  => url_username($post['username'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['username' => 'Create a messages item'])
            . view('messages/success')
            . view('templates/footer');
    }
    public function update()
    {
        echo "Welcome to Editing messages";
        return view('templates/header')
            . view('messages/update')
            . view('templates/footer');
    }
    public function delete()
    {
        echo "Here you can remove messages items";
        return view('templates/header')
            . view('messages/delete')
            . view('templates/footer');
    }
}
?>