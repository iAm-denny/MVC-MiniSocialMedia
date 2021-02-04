<?php

namespace app\models;

use app\Database;

class screamModel
{

    public ?string $userid = null;
    public ?string $content = null;
    public ?string $screamid = null;
    public ?string $comment = null;

    public function loadContent($data)
    {
        $this->userid = $data['userid'];
        $this->content = $data['content'];
    }
    public function getscreamid($screamid)
    {
        $this->screamid = $screamid;
    }
    public function loadcomment($data)
    {
        $this->userid = $data['userid'];
        $this->comment = $data['comment'];
        $this->scream_id = $data['scream_id'];
    }
    public function saveContent()
    {
        $db = new Database();
        $db->saveContent($this);
    }
    public function deleteContent()
    {
        $db = new Database();
        $db->deleteContent($this->scream_id);
    }
    public function detailscreamid()
    {
        $db = new Database();
        $db->getSpecificContent($this->screamid);
    }
    public function savecomment()
    {
        $db = new Database();
        $db->savecomment($this);
    }
}
