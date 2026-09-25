<?php

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Non authentifié']);
    exit;
}

$user = new Models\User();
$userDataList = $user->getUserById($_SESSION['user_id']);

if (empty($userDataList)) {
    http_response_code(404);
    echo json_encode(['error' => 'Utilisateur introuvable']);
    exit;
}

$userData = $userDataList[0]; // On prend la première ligne (car il peut y en avoir plusieurs si l'user a plusieurs projets)

http_response_code(200);
echo json_encode([
    'username' => $userData->username,
    'subscription' => [
        'name' => strtolower($userData->name) // le frontend s'attend à "argent", "or", etc.
    ]
]);
exit;