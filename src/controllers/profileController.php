<?php

$error = [];

if (!empty($_POST)) {
    $user = new Models\User();
    $userId = $_POST["user_id"];
    try {
        $user->getUserById($userId);
    } catch (\Exception $e) {
        $error['userId'] = $e->getMessage();
    }



    if (empty($error)) {
        if ($user->getUserById($userId)) {
            echo json_encode(['userInformations' => $user->getUserById($userId)]);
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


?>