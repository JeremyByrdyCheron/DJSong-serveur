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
		// Au lieu d'utiliser register(), on utilise login()
		if ($user->login($_POST['password'])) {
			http_response_code(200);
			echo json_encode(["isConnected" => true]);
			exit;
		} else {
			$error['global'] = 'Email ou mot de passe incorrect';
		}
	}
} else {

	http_response_code(400);
	echo json_encode([
		'error' => 'form empty',
	]);
	exit;
}

http_response_code(400);
echo json_encode([
	'error' => $error,
]);