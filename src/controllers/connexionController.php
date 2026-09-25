<?php
if (!empty($_SESSION['token'])) redirectTo('playboard');
$error = [];

if (!empty($_POST)) {
	$user = new Models\User();
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
		if ($user->getUser()) {
			http_response_code(200);
			exit;
		} else {
			$error['global'] = 'Echec de l\'enregistrement';
		}
	}
} else {

	http_response_code(400);
	echo json_encode([
		'error' => 'form empty',
	]);
	exit;
}
