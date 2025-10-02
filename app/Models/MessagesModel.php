<?php

namespace App\Models;

use CodeIgniter\Model;

class MessagesModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'summary', 'body'];
    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getMessages($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
