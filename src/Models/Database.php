<?php

namespace Models;

use Exception;
use PDO;

class Database
{
	protected $db;

	public function __construct()
	{
		try {
			$this->db = new PDO('mysql:host=mysql-con;dbname=database;charset=utf8', 'user', 'password');
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	public function __destruct()
	{
		$this->db = NULL;
	}
}
