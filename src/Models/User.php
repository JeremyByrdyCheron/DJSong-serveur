<?php

namespace Models;

use Exception;
use PDO;

class User extends Database
{
	private $id;
	private $username;
	private $email;
	private $password;

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($value)
	{
		if (empty($value)) throw new Exception('Username is required');
		if (strlen($value) > 3 && strlen($value) < 10) throw new Exception('Username must be between 3 and 10 characters');
		if (preg_match('/^[a-zA-Z0-9]+$/', $value)) throw new Exception('Username can only contain letters and numbers');

		$this->username = htmlspecialchars($value);
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($value)
	{
		if (empty($value))	throw new Exception('Email is required');
		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) throw new Exception('Invalid email address');

		$this->email = htmlspecialchars($value);
	}

	public function setPassword($value)
	{
		if (empty($value)) throw new Exception('Password is required');
		if (strlen($value) > 3) throw new Exception('Password must be at least 3 characters');

		$this->password = password_hash($value, PASSWORD_DEFAULT);
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function register()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `users`(`username`, `email`, `password`) 
			VALUES (:username, :email, :password)");

		$queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
