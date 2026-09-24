<?php
namespace Models;

use DateTime;
use Exception;
use PDO;

class SongProject extends Database
{
    private $id;
    private $title;

    private $json;
    private $creationDate;
    private $updateDate;
    private $sharingCode;
    private $userId;

    public function getTitle()
    {
        return $this->title;
    }
    public function getJson()
    {
        return $this->json;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
    public function getSharingCode()
    {
        return $this->sharingCode;
    }
    public function getUserId()
    {
        return $this->userId;
    }

    public function setTitle($value)
    {
        if (strlen($value) < 0 || strlen($value) > 255) {
            throw new Exception("Le titre doit faire entre 1 et 255 caractères.");
        }
        $this->title = htmlspecialchars($value);
    }

    public function setJson($value)
    {
        $this->json = htmlspecialchars($value);
    }

    public function setCreationDate()
    {
        $today = date("Y-m-d");
        $this->creationDate = $today;
    }

    public function setUpdateDate()
    {
        $today = date("Y-m-d");
        $this->creationDate = $today;
    }

    public function setSharingCode()
    {
        $uuid = uniqid();
        $this->sharingCode = $uuid;
    }
}

?>