<?php

namespace app\controllers;

use app\Router;
use app\models\screamModel;
use app\Database;

class screamController
{
    public static function home()
    {
        $db = new Database();
        $screams = $db->getScream();
        $router = new Router();
        return $router->renderView("screams/home", ['screams' => $screams]);
    }
    public static function createpost()
    {
        $router = new Router();

        $scream = [
            'content' => '',
            'userid' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $scream['content'] = $_POST['content'];
            $scream['userid'] = $_POST['userid'];

            $screamModel = new screamModel();
            $screamModel->loadContent($scream);
            $screamModel->saveContent();
        }
        return $router->renderView("screams/createPost");
    }
    public static function deletepost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $screamid = $_POST['screamid'];

            $screamModel = new screamModel();
            $screamModel->getscreamid($screamid);
            $screamModel->deleteContent();
        }
    }
    public static function detailscream()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $screamid = $_GET['screamid'];
            $db = new Database();
            $scream = $db->getSpecificContent($screamid);
            $comments = $db->getComment($screamid);
            $router = new Router();
            return $router->renderView("screams/screamDetail", ["scream" => $scream, "comments" => $comments]);
        }
    }
    public static function createcomment()
    {
        $comment = [
            'comment' => '',
            'scream_id' => '',
            'userid' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $screamModel = new screamModel();
            $comment['comment'] = $_POST['comment'];
            $comment['scream_id'] = $_POST['screamid'];
            $comment['userid'] = $_POST['userid'];
            $screamModel->loadcomment($comment);
            $screamModel->savecomment();
        }
    }
}
