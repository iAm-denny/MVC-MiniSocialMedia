<?php

require __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\UserController;
use app\controllers\screamController;

$router = new Router();

$router->get('/sign-in', [UserController::class, 'signin']);
$router->post('/sign-in', [UserController::class, 'signin']);
$router->get('/sign-up', [UserController::class, 'signup']);
$router->post('/sign-up', [UserController::class, 'signup']);
$router->get('/signout', [UserController::class, 'signout']);
$router->get('/', [screamController::class, 'home']);
$router->get('/home', [screamController::class, 'home']);
$router->get('/create-post', [screamController::class, 'createpost']);
$router->post('/create-post', [screamController::class, 'createpost']);
$router->post('/delete-post', [screamController::class, 'deletepost']);
$router->get('/detail', [screamController::class, 'detailscream']);
$router->post('/detail', [screamController::class, 'createcomment']);

$router->resolve();
