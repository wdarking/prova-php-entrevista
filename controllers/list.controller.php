<?php

require 'repositories/user.repository.php';

$userRepository = new UserRepository();

$users = $userRepository->list();

$colors = (new Connection())->query("SELECT * FROM colors");

if ($id = $_GET['user_id']) {
    $selectedUser = $userRepository->fetch($id);
    $selectedUser->colors = $userRepository->getColors($id) ?? [];
}

require __DIR__ . '/../views/list.view.php';
