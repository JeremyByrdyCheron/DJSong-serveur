<?php

$error = [];

if (!empty($_POST)) {
	$user = new Models\User();

	try {
		$user->setUsername($_POST['username']);
	} catch (\Exception $e) {
		$error['username'] = $e->getMessage();
	}
	try {
		$user->setEmail($_POST['email']);
	} catch (\Exception $e) {
		$error['email'] = $e->getMessage();
	}
	try {
		$user->setPassword($_POST['password']);
	} catch (\Exception $e) {
		$error['password'] = $e->getMessage();
	}

	if (empty($error)) {
		if ($user->register()) {
			redirectTo('/');
		} else {
			$error['global'] = 'Echec de l\'enregistrement';
		}
	}
}

render('index', false, [
	'error' => $error,
]);
