<?php

require_once 'app.php';

//if (isset($_POST['login'])) {
//    $userService = new \Service\User\UserService($db, $encryptionService);
//    $username = $_POST['nickname'];
//    $password = $_POST['password'];
//
//    if (!($userService->login($username, $password))) {
//
//        throw new \Exceptions\LoginException("Password mismatch!");
//    }
//
//    header("Location: profile.php");
//    exit;
//}
include 'nav.php';
include_once 'frontend/Login_frontend.php';
