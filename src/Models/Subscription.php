<?php
namespace Models;

use Exception;
use PDO;

class Subscription extends Database
{
    private $id;
    private $name;

    private $price;
    private $avantage1;
    private $avantage2;
    private $avantage3;


    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getAvantage1()
    {
        return $this->avantage1;
    }
    public function getAvantage2()
    {
        return $this->avantage2;
    }
    public function getAvantage3()
    {
        return $this->avantage3;
    }

}



?>