<?php

namespace Models;

use DateTimeImmutable;
use Exception;
use PDO;

class User extends Database
{
	private $id;
	private $username;
	private $email;
	private $password;

	private $userCode;

	private $subscriptionId;
	private $subscriptionEnd;



	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($value)
	{
		if (empty($value))
			throw new Exception('Username is required');
		if (strlen($value) < 3 || strlen($value) > 255)
			throw new Exception('Username must be between 3 and 255 characters');
		if (!preg_match('/^[a-zA-Z0-9]+$/', $value))
			throw new Exception('Username can only contain letters and numbers');

		$this->username = htmlspecialchars($value);
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($value)
	{
		if (empty($value))
			throw new Exception('Email is required');
		if (!filter_var($value, FILTER_VALIDATE_EMAIL))
			throw new Exception('Invalid email address');

		$this->email = htmlspecialchars($value);
	}

	public function setPassword($value)
	{
		if (empty($value))
			throw new Exception('Password is required');
		if (strlen($value) < 3)
			throw new Exception('Password must be at least 3 characters');

		$this->password = password_hash($value, PASSWORD_DEFAULT);
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getUserCode()
	{
		return $this->userCode;
	}

	public function setUserCode()
	{
		$uuid = uniqid();
		$this->userCode = $uuid;

	}

	public function getSubscriptionId()
	{
		return $this->subscriptionId;
	}
	public function setSubscriptionId($value)
	{
		$this->subscriptionId = $value;
	}

	public function getSubscriptionEnd()
	{
		return $this->subscriptionEnd;
	}
	public function setSubscriptionEnd($value)
	{
		$this->subscriptionEnd = $value;
	}

	public function getUserById($value)
	{
		$queryExecute = $this->db->prepare("SELECT sub.name, song.*, u.* FROM users u
		LEFT JOIN subscription sub ON u.subscription_id= sub.id 
		LEFT join song_project song on u.id = song.user_id
		WHERE u.id = :id");
		$queryExecute->bindValue(':id', $value, PDO::PARAM_STR);

		$queryExecute->execute();
		return $queryExecute->fetchAll(PDO::FETCH_OBJ);
	}


	public function register()
	{

		$this->setUserCode();
		$this->setSubscriptionId(1);
		$endDate = new DateTimeImmutable("2099-12-31");
		$this->setSubscriptionEnd($endDate->format("Y-m-d"));

		$queryExecute = $this->db->prepare("INSERT INTO `users`(`username`, `email`, `password`, `user_code`, `subscription_id`, `subscription_end`) 
			VALUES (:username, :email, :password, :user_code, :subscription_id, :subscription_end)");

		$queryExecute->bindValue(':username', $this->username, PDO::PARAM_STR);
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
		$queryExecute->bindValue(':user_code', $this->userCode, PDO::PARAM_STR);
		$queryExecute->bindValue(':subscription_id', $this->subscriptionId, PDO::PARAM_STR);
		$queryExecute->bindValue('subscription_end', $this->subscriptionEnd, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
