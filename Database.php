<?php

namespace app;

use PDO;
use app\models\userModel;
use app\models\screamModel;

class Database
{
    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3307;dbname=social', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }
    public function saveUser(UserModel $data)
    {
        $statement = $this->pdo->prepare("INSERT INTO users ( email, name, password ) VALUES( :email, :name, :password ) ");
        $statement->bindValue(':email', $data->email);
        $statement->bindValue(':name', $data->name);
        $statement->bindValue(':password', md5($data->password));
        $statement->execute();
        header('Location: sign-in?msg=You\'ve successfully registered sign in here');
    }
    public function loggedin(userModel $data)
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $statement->bindValue(':email', $data->email);
        $statement->bindValue(':password', md5($data->password));
        $statement->execute();
        $userdata = $statement->fetchAll($this->pdo::FETCH_ASSOC) ?? false;

        if ($userdata) {
            $statementCount = $this->pdo->prepare("SELECT * FROM users WHERE userid = :id");
            $statementCount->bindValue(':id', $userdata[0]['userid']);
            $statementCount->execute();
            if ($statementCount->fetchColumn() > 0) {
                setcookie("userid", $userdata[0]['userid'], time() + (86400 * 30), "/");
                setcookie("name", $userdata[0]['name'], time() + (86400 * 30), "/");
                header('Location: /');
            } else {
                echo "Not";
            }
        } else {
            header('Location: sign-in?error=Email or Password must be correct.');
        }
    }

    public function getScream()
    {
        $statement = $this->pdo->prepare("SELECT 
         (SELECT COUNT(*) FROM comments WHERE screams.scream_id = comments.scream_id) AS commentCount,
        screams.content, screams.created_date, screams.scream_id,users.name, users.userid FROM 
        screams JOIN users ON screams.userid = users.userid  
        ORDER BY screams.created_date desc");
        $statement->execute();
        return  $statement->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function saveContent(screamModel $screamModel)
    {
        $statement = $this->pdo->prepare("INSERT INTO screams (content, userid) VALUES(:content, :userid )");
        $statement->bindValue(':content', $screamModel->content);
        $statement->bindValue(':userid', $screamModel->userid);
        $statement->execute();
        header("Location: /");
    }
    public function deleteContent($screamid)
    {

        $statement = $this->pdo->prepare("DELETE FROM screams WHERE scream_id = :screamid");
        $statement->bindValue(':screamid', $screamid);

        $statement->execute();
        header("Location: /");
    }
    public function getSpecificContent($screamid)
    {

        $statement = $this->pdo->prepare("SELECT 
        (SELECT COUNT(*) FROM comments WHERE screams.scream_id = comments.scream_id) AS commentCount,
        screams.content, screams.created_date, screams.scream_id,users.name, users.userid 
        FROM screams JOIN users ON screams.userid = users.userid   
        WHERE screams.scream_id= :screamId");
        $statement->bindValue(':screamId', $screamid);
        $statement->execute();
        return $statement->fetch($this->pdo::FETCH_ASSOC);
    }
    public function savecomment(screamModel $screamModel)
    {
        $statement = $this->pdo->prepare("INSERT INTO comments (comment, scream_id,userid) VALUES(:comment, :scream_id,:userid )");
        $statement->bindValue(':comment', $screamModel->comment);
        $statement->bindValue(':scream_id', $screamModel->scream_id);
        $statement->bindValue(':userid', $screamModel->userid);
        $statement->execute();
        header("Location: /detail?screamid={$screamModel->scream_id}");
    }
    public function getComment($screamid)
    {
        $statement = $this->pdo->prepare("SELECT 
        users.name, comments.comment, comments.created_date from 
        screams JOIN comments ON screams.scream_id = comments.scream_id
        JOIN users ON users.userid = comments.userid 
        WHERE screams.scream_id= :screamId ORDER BY comments.created_date DESC");
        $statement->bindValue(':screamId', $screamid);
        $statement->execute();
        return  $statement->fetchAll($this->pdo::FETCH_ASSOC);
    }
}
// JOIN comments ON screams.scream_id = comments.comment_id 
