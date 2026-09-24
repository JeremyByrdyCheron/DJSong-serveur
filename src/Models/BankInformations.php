<?php
namespace Models;

use Exception;
use PDO;

class BankInformations extends Database
{

    private $id;
    private $user_id;
    private $iban;

    public function getIban()
    {
        return $this->iban;
    }

    public function setIban($value)
    {
        if (empty($value))
            throw new Exception('Votre IBAN est requis');
        if ($value . trim($value) !== 27)
            throw new Exception("Votre IBAN doit être composé de 27 caractères");
        if (preg_match("/^[A-Z]{2}[0-9]{2}[A-Z0-9]{11,30}$/", $value)) {
            $this->iban = htmlspecialchars($value);
        }
        throw new Exception("Format d'IBAN invalide");
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($value)
    {
        $this->user_id = $value;
    }
}



?>