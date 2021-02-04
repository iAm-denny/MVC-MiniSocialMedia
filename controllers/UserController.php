<?php

namespace app\controllers;

use app\Router;
use app\models\userModel;
use app\models\screamModel;


class UserController
{
    public static function signin()
    {
        $router = new Router();
        $user = [
            'email' => '',
            'password' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['pwd'];

            $userModel = new userModel();
            $userModel->loadLog($user);
            $userModel->login();
        }
        return $router->renderView("screams/signin");
    }
    public static function signup()
    {
        $router = new Router();

        $user = [
            'email' => '',
            'name' => '',
            'password' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user['email'] = $_POST['email'];
            $user['name'] = $_POST['name'];
            $user['password'] = $_POST['pwd'];

            $userModel = new userModel();
            $userModel->load($user);
            $userModel->save();
        }
        return $router->renderView("screams/signup");
    }
 
    public static function signout()
    {
        $router = new Router();
        return $router->renderView("screams/signout");
    }

}
