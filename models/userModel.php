<?php

namespace app\models;

use app\Database;

class UserModel
{

    public ?string $id  = null;
    public ?string $email  = null;
    public ?string $name  = null;
    public ?string $password  = null;

    public function load($data)
    {
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->password = $data['password'];
    }
    public function loadLog($data)
    {
        $this->email = $data['email'];
        $this->password = $data['password'];
    }
    public function save()
    {
        $db = new Database();
        $db->saveUser($this);
    }
    public function login()
    {
        $db = new Database();
        $db->loggedin($this);
    }
}
